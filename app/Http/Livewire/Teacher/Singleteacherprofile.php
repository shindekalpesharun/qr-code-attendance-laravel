<?php

namespace App\Http\Livewire\Teacher;

use App\Http\Livewire\Subject\Subject;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Departments;
use App\Models\Lectures;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Singleteacherprofile extends Component
{
    public $teacher_id;
    public $teacher;
    public $lecturesList;

    public $classes;
    public $departments;
    public $subject;

    // add lecture form 
    public $selectedDepartment;
    public $selectedClass;
    public $selectedSubject;
    public $startTime;
    public $endTime;

    // TODO: list curr datetime wise
    public $debug;

    public function mount($id)
    {
        $this->teacher_id = $id;
        $this->teacher = Teacher::with('user')->where([['id', $this->teacher_id]])->get();
        $this->departments = Departments::all();
        $this->lecturesList = Lectures::with('subject.class.department')->where([['user_id', $this->teacher[0]->user_id]])->get();
    }

    public function updatedselectedDepartment()
    {
        $this->classes = Classes::where([['department_id', $this->selectedDepartment]])->get();
        $this->subject = null;
    }

    public function updatedselectedClass()
    {
        $this->subject = Subjects::where([['class_id', $this->selectedClass], ['user_id', $this->teacher[0]->user_id]])->get();
    }

    public function submit()
    {
        if (
            !isset($this->teacher[0]->user_id) || !isset($this->selectedSubject) || !isset($this->startTime) ||
            !isset($this->endTime)
        ) {
            return redirect('teacher/' . $this->teacher_id)->with('error', 'An error occurred.');
        }
        DB::transaction(function () {
            $lectures = Lectures::create([
                'user_id' => $this->teacher[0]->user_id,
                'subject_id' => $this->selectedSubject,
                'start_time' => $this->startTime,
                'end_time' => $this->endTime,
            ]);

            $students = Students::where([['class_id', $this->selectedClass]])->get();
            foreach ($students as $item) {
                $attendance = new Attendance();
                $attendance->user_id = $item->user_id;
                $attendance->lectures_id = $lectures->id;
                $attendance->status = "Absent";
                $attendance->save();
            }
        }, 3);
        return redirect('teacher/' . $this->teacher_id);
    }

    public function render()
    {
        return view('livewire.teacher.singleteacherprofile');
    }
}

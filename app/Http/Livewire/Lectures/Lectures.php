<?php

namespace App\Http\Livewire\Lectures;

use App\Models\Lectures as ModelsLectures;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Livewire\Component;

class Lectures extends Component
{
    public $lecture_id;
    public $lecture_details;
    public $start_time;
    public $end_time;
    public $lecture_status;

    public function mount($id)
    {
        $this->lecture_id = $id;
        $this->lecture_details = ModelsLectures::with('subject.class.department')->where([['id', $this->lecture_id]])->get();
        $this->start_time = $this->lecture_details[0]->start_time;
        $this->end_time = $this->lecture_details[0]->end_time;

        $start = Carbon::parse($this->start_time); // Replace with your start datetime
        $end = Carbon::parse($this->end_time); // Replace with your end datetime
        $currentTime = Carbon::now();


        if ($currentTime >= $start && $currentTime <= $end) {
            $this->lecture_status = "between";
        } elseif ($currentTime < $start) {
            $this->lecture_status = "isBefore";
        } else {
            $this->lecture_status = "isAfter";
        }

        // $this->teacher = Teacher::with('user')->where([['id', $this->teacher_id]])->get();
        // $this->departments = Departments::all();
        // $this->lecturesList = Lectures::with('subject.class.department')->where([['user_id', $this->teacher[0]->user_id]])->get();

        // // $this->class = Classes::where([['id', $this->class_id]])->get();
        // // $this->studentAttendance = Attendance::where([['user_id', $this->student[0]['user_id']]])->orderByDesc('created_at')->get();
        // // $this->monthCount = Attendance::selectRaw('DATE_FORMAT(created_at, "%m %Y") as month, COUNT(*) as count')
        // //     ->groupBy('month')
        // //     ->orderBy('month', 'ASC')
        // //     ->get();
    }
    public function render()
    {
        return view('livewire.lectures.lectures');
    }
}

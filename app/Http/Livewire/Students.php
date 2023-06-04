<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Lectures;
use App\Models\Students as ModelsStudents;
use App\Models\Subjects;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Students extends Component
{
    use WithFileUploads;

    public $class_id;
    public $class;
    public $student;

    // form
    public $studentName;
    public $studentEmail;
    public $studentPassword;
    public $studentDOB;
    public $studentGender;
    public $studentAddress;
    public $studentPhoneNumber;

    // subject add form
    public $subjectName;
    public $teacherList;
    public $selectTeacher;
    public $subject_list;

    public function mount($id)
    {
        $this->class_id = $id;
        $this->student = ModelsStudents::with('user')->where([['class_id', $this->class_id]])->get();
        $this->class = Classes::where([['id', $this->class_id]])->get();
        $this->teacherList = Teacher::with('user')->get();
        $this->subject_list = Subjects::where([['class_id', $this->class_id]])->get();
    }

    public function submit()
    {
        // $validatedData = $this->validate([
        //     'studentName' => 'required',
        //     'studentEmail' => 'required',
        //     'studentPassword' => 'required',
        //     'studentDOB' => 'required',
        //     'studentGender' => 'required',
        //     'studentAddress' => 'required',
        //     'studentPhoneNumber' => 'required'
        // ]);

        $user = User::create([
            'name' => $this->studentName,
            'email' => $this->studentEmail,
            'user_types_id' => 4,
            'password' => bcrypt($this->studentPassword),
        ]);

        $student = ModelsStudents::create([
            'class_id' => $this->class_id,
            'user_id' => $user->id,
            'date_of_birth' => $this->studentDOB,
            'gender' => $this->studentGender,
            'address' => $this->studentAddress,
            'phone_number' => $this->studentPhoneNumber,
        ]);
        return redirect('class/' . $this->class_id);
    }

    public function submitSubject()
    {

        $subjects = Subjects::create([
            'class_id' => $this->class_id,
            'user_id' => $this->selectTeacher,
            'subject_name' => $this->subjectName,
        ]);
        return redirect('class/' . $this->class_id);
    }

    public function render()
    {
        return view('livewire.students');
    }
}

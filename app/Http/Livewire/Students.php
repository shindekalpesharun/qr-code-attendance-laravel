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
    public $permanent_registration_number;

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
        // validation custom
        if (
            !isset($this->studentName) || !isset($this->studentEmail) || !isset($this->studentPassword) ||
            !isset($this->class_id) || !isset($this->permanent_registration_number) || !isset($this->studentDOB) ||
            !isset($this->studentGender) || !isset($this->studentAddress) || !isset($this->studentPhoneNumber)
        ) {
            return redirect('class/' . $this->class_id)->with('error', 'An error occurred.');
        }

        $user = User::create([
            'name' => $this->studentName,
            'email' => $this->studentEmail,
            'user_types_id' => 4,
            'password' => bcrypt($this->studentPassword),
        ]);

        $student = ModelsStudents::create([
            'class_id' => $this->class_id,
            'user_id' => $user->id,
            'permanent_registration_number' => $this->permanent_registration_number,
            'date_of_birth' => $this->studentDOB,
            'gender' => $this->studentGender,
            'address' => $this->studentAddress,
            'phone_number' => $this->studentPhoneNumber,
        ]);
        return redirect('class/' . $this->class_id);
    }

    public function submitSubject()
    {
        if (
            !isset($this->class_id) || !isset($this->selectTeacher) || !isset($this->subjectName)
        ) {
            return redirect('class/' . $this->class_id)->with('error', 'An error occurred.');
        }
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

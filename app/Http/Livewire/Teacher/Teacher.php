<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher as ModelsTeacher;
use App\Models\User;
use Livewire\Component;

class Teacher extends Component
{
    // form
    public $teacherName;
    public $teacherEmail;
    public $teacherPassword;
    public $teacherBOD;
    public $teacherGender;
    public $teacherAddress;
    public $teacherPhoneNumber;

    public $teachers;

    public function mount()
    {
        $this->teachers = ModelsTeacher::with('user')->get();
    }
    public function submit()
    {
        if (
            !isset($this->teacherName) || !isset($this->teacherEmail) || !isset($this->teacherPassword) ||
            !isset($this->teacherBOD) || !isset($this->teacherGender) || !isset($this->teacherAddress) ||
            !isset($this->teacherPhoneNumber)
        ) {
            return redirect('teacher')->with('error', 'An error occurred.');
        }
        $user = User::create([
            'name' => $this->teacherName,
            'email' => $this->teacherEmail,
            'user_types_id' => 3,
            'password' => bcrypt($this->teacherPassword),
        ]);

        $student = ModelsTeacher::create([
            'user_id' => $user->id,
            'date_of_birth' => $this->teacherBOD,
            'gender' => $this->teacherGender,
            'address' => $this->teacherAddress,
            'phone_number' => $this->teacherPhoneNumber,
        ]);
        return redirect('teacher');
    }
    public function render()
    {
        return view('livewire.teacher.teacher');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Classes as ModelsClasses;
use App\Models\Departments;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Classes extends Component
{
    public $user;
    public $class_id;
    public $className;
    public $departmentName;
    public $teacher_list;
    public $selectedTeacher;

    public $class;

    public function mount($id)
    {
        $this->class_id = $id;
        $this->class = ModelsClasses::with('department')->where([['department_id', $this->class_id]])->get();
        $this->teacher_list = Teacher::with('user')->get();
        $this->departmentName = Departments::where([['id', $this->class_id]])->get();
        $this->user = Auth::user();
    }

    public function submit()
    {
        // $this->validate([
        //     'className' => 'required|string',
        // ]);
        if (
            !isset($this->className) || !isset($this->selectedTeacher) || !isset($this->class_id)
        ) {
            return redirect('department/' . $this->class_id)->with('error', 'An error occurred.');
        }

        $user = ModelsClasses::create([
            'name' => $this->className,
            'teacher_id' => $this->selectedTeacher,
            'department_id' => $this->class_id,
        ]);
        return redirect('department/' . $this->class_id);
    }

    public function delete($deleteid)
    {
        $user = ModelsClasses::find($deleteid)->delete();
        return redirect('department/' . $this->class_id);
    }

    public function render()
    {
        return view('livewire.classes');
    }
}

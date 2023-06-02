<?php

namespace App\Http\Livewire;

use App\Models\Classes as ModelsClasses;
use App\Models\Departments;
use Livewire\Component;

class Classes extends Component
{
    public $class_id;
    public $className;
    public $departmentName;

    public $class;

    public function mount($id)
    {
        $this->class_id = $id;
        $this->class = ModelsClasses::with('department')->where([['department_id', $this->class_id]])->get();
        $this->departmentName = Departments::where([['id', $this->class_id]])->get();
    }

    public function submit()
    {
        $this->validate([
            'className' => 'required|string',
        ]);

        $user = ModelsClasses::create([
            'name' => $this->className,
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

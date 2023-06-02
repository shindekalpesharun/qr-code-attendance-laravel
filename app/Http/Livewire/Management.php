<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Livewire\Component;

class Management extends Component
{
    public $departmentName;

    public $departments;

    public function mount()
    {
        $this->departments = Departments::all();
    }

    public function submit()
    {
        $this->validate([
            'departmentName' => 'required|string',
        ]);

        $user = Departments::create([
            'name' => $this->departmentName,
        ]);
        // return redirect('management/' . $this->class_id);
        return redirect()->route('management');
    }

    public function render()
    {
        return view('livewire.management');
    }
}

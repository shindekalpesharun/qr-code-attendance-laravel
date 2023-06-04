<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Management extends Component
{
    public $user;
    public $departmentName;
    public $departments;

    public function mount()
    {
        $this->departments = Departments::all();
        $this->user = Auth::user();
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

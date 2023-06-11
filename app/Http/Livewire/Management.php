<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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
        // validation custom
        if (!isset($this->departmentName)) {
            return redirect()->route('management')->with('error', 'An error occurred.');
        }

        $user = Departments::create([
            'name' => $this->departmentName,
        ]);
        // return redirect('management/' . $this->class_id);
        return redirect()->route('management');
    }

    public function delete($deleteid)
    {
        $user = Departments::find($deleteid)->delete();
        return redirect('management/');
    }

    public function render()
    {
        return view('livewire.management');
    }
}

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

    public $errors = [];

    public function mount()
    {
        $this->departments = Departments::all();
        $this->user = Auth::user();
    }

    public function submit()
    {
        // $this->validate([
        //     'departmentName' => 'required|string',
        // ]);
        try {
            // $this->validate([
            //     'departmentName' => 'required|string',
            // ]);

            $user = Departments::create([
                'name' => $this->departmentName,
            ]);
            // return redirect('management/' . $this->class_id);
            return redirect()->route('management');

            // Validation passed, continue with your logic here
        } catch (ValidationException $e) {
            $this->errors = $e->validator->errors()->toArray();
        }
    }

    public function render()
    {
        return view('livewire.management');
    }
}

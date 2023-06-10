<?php

namespace App\Http\Livewire\Report;

use App\Models\Classes;
use App\Models\Departments;
use App\Models\Lectures;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Report extends Component
{
    public $report;
    public $departments;
    public $selectedDepartment;
    public $classes;
    public $selectedClass;
    public $subject;
    public $selectedSubject;

    public $data;

    public $debug;

    public function mount()
    {
        $this->departments = Departments::all();
        $this->data = Students::with('attendances', 'user', 'class.department')->get();
    }

    public function updatedselectedDepartment()
    {
        $this->classes = Classes::where([['department_id', $this->selectedDepartment]])->get();
        $this->data = Students::with('attendances', 'user', 'class.department')
            ->whereHas('class.department', function ($query) {
                $query->where('id', $this->selectedDepartment);
            })->get();
        $this->subject = null;
    }

    public function updatedselectedClass()
    {
        $this->subject = Subjects::where([['class_id', $this->selectedClass]])->get();
        $this->data = Students::with('attendances', 'user', 'class.department')
            ->whereHas('class.department', function ($query) {
                $query->where('id', $this->selectedDepartment);
            })
            ->whereHas('class', function ($query) {
                $query->where('id', $this->selectedClass);
            })
            ->get();
    }

    public function updatedselectedSubject()
    {
        // $this->subject = Subjects::where([['class_id', $this->selectedClass]])->get();
        $this->data = Students::with('attendances', 'user', 'class.department', 'class.subject')
            ->whereHas('class.department', function ($query) {
                $query->where('id', $this->selectedDepartment);
            })
            ->whereHas('class', function ($query) {
                $query->where('id', $this->selectedClass);
            })
            ->whereHas('class.subject', function ($query) {
                $query->where('id', $this->selectedSubject);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.report.report');
    }
}

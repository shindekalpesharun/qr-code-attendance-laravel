<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

use WithPagination;

class Home extends Component
{
    public $latestAttendance;


    public function mount()
    {
        $this->latestAttendance = Attendance::with(['user', 'student.class.department'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function render()
    {
        // $data = Attendance::with(['user', 'student.class.department'])
        //     ->orderByDesc('created_at')
        //     ->get();
        return view('livewire.home', [
            // 'latestAttendance' => Attendance::paginate(5)
        ]);
    }
}

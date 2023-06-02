<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Students as ModelsStudents;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Singlestudentprofile extends Component
{
    public $student_id;
    public $student;
    public $studentAttendance;

    public $monthCount;


    public function mount($id)
    {
        $this->student_id = $id;
        $this->student = ModelsStudents::with('user', 'class')->where([['id', $this->student_id]])->get();
        // $this->class = Classes::where([['id', $this->class_id]])->get();
        $this->studentAttendance = Attendance::where([['user_id', $this->student[0]['user_id']]])->orderByDesc('created_at')->get();
        $this->monthCount = Attendance::selectRaw('DATE_FORMAT(created_at, "%m %Y") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();
    }

    public function render()
    {
        return view('livewire.singlestudentprofile');
    }
}

<?php

namespace App\Http\Livewire\Lectures;

use App\Models\Attendance;
use App\Models\Lectures as ModelsLectures;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Livewire\Component;

class Lectures extends Component
{
    public $lecture_id;
    public $lecture_details;
    public $start_time;
    public $end_time;
    public $lecture_status;
    public $attendances;

    public function mount($id)
    {
        $this->lecture_id = $id;
        $this->lecture_details = ModelsLectures::with('subject.class.department')->where([['id', $this->lecture_id]])->get();
        $this->start_time = $this->lecture_details[0]->start_time;
        $this->end_time = $this->lecture_details[0]->end_time;
        $this->attendances = Attendance::with('lectures', 'user')->where([['lectures_id', $this->lecture_id]])->get();

        $start = Carbon::parse($this->start_time); // Replace with your start datetime
        $end = Carbon::parse($this->end_time); // Replace with your end datetime
        $currentTime = Carbon::now();

        if ($currentTime >= $start && $currentTime <= $end) {
            $this->lecture_status = "between";
        } elseif ($currentTime < $start) {
            $this->lecture_status = "isBefore";
        } else {
            $this->lecture_status = "isAfter";
        }
    }
    public function render()
    {
        return view('livewire.lectures.lectures');
    }
}

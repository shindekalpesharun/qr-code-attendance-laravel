<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Lectures;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Validator;
use Symfony\Component\HttpFoundation\Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Define validation rules for the task data
        $validator = Validator::make($request->all(), [
            'lectures_id' => 'required|integer',
        ]);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $lectures = Lectures::where([['id', $request->lectures_id]])->get();
        $start_time = $lectures[0]->start_time;
        $end_time = $lectures[0]->end_time;

        $start = Carbon::parse($start_time); // Replace with your start datetime
        $end = Carbon::parse($end_time); // Replace with your end datetime
        $currentTime = Carbon::now();



        if ($currentTime >= $start && $currentTime <= $end) {
            $attendance = Attendance::where([['user_id', $request->user()->id], ['lectures_id', $request->lectures_id], ['status', 'Present']])->count();
            if ($attendance != 0) {
                return response()->json(['data' => "You are already present in this lecture"], Response::HTTP_NOT_FOUND);
            }
            $attendance = Attendance::where([['user_id', $request->user()->id], ['lectures_id', $request->lectures_id], ['status', 'Absent']])->get();

            $attendance = Attendance::find($attendance[0]->id);
            $attendance->status = 'Present';
            $attendance->created_at = Carbon::now();
            $attendance->updated_at = Carbon::now();
            $attendance->save();


            // $attendance = Attendance::create([
            //     'user_id' => $request->user()->id,
            //     'lectures_id' => $request->lectures_id,
            //     'status' => "Present"
            // ]);
            return response()->json(['data' => $attendance], Response::HTTP_CREATED);
        } else {
            return response()->json(['data' => "This is not lecture time"], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

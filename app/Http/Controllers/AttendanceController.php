<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        //     'categories_id' => 'required|nullable|integer',
        //     'price' => 'required|integer',
        //     'image_url' => 'required|file|mimes:jpeg,png',
        // ]);

        // If validation fails, return an error response
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // }

        // $image_path = $request->file('image_url')->store('image', 'public');

        // // Create a new task object with the validated data
        // $data = $request->all();
        // $data['image_url'] = $image_path;

        $attendance = Attendance::create([
            'user_id' => $request->user()->id,
        ]);

        // // Return a success response with the created task data
        return response()->json(['data' => $attendance], Response::HTTP_CREATED);
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

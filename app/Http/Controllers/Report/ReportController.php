<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Students::with('attendances', 'user', 'class.department', 'class.subject')
            ->where('user_id', $request->user()->user_types_id)
            // ->whereHas('class.department', function ($query) {
            //     $query->where('id', $this->selectedDepartment);
            // })
            // ->whereHas('class', function ($query) {
            //     $query->where('id', $this->selectedClass);
            // })
            // ->whereHas('class.subject', function ($query) {
            //     $query->where('id', $this->selectedSubject);
            // })
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show()
    {
        return view('web.report.report');
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

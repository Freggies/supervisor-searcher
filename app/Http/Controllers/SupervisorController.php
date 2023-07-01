<?php

namespace App\Http\Controllers;

use App\Models\supervisor;
use App\Http\Requests\StoresupervisorRequest;
use App\Http\Requests\UpdatesupervisorRequest;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function supervisors()
    {
        $supervisors = supervisor::paginate();

        return view('supervisor.index', compact('supervisors'));
    }

    public function index()
    {
        $lecturers_id = auth()->lecturers()->id;
        $lecturers = Lecturer::find($lecturers_id);
        return view('supervisor.index')->with('ProjectTitles', $lecturers->ProjectTitles);
    }

}

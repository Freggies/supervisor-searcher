<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTitle;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class ProjectTitleController extends Controller
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
    public function createProject()
    {
        return view('projecttitle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProject(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'id' => 'required|exists:lecturers,id'
        ]);

        // Save the project title in the database
        $projecttitles = new ProjectTitle();
        $projecttitles->title = $validatedData['title'];
        $projecttitles->id = $validatedData['id'];
        $projecttitles->save();

        return redirect()->route('projecttitle.create')->with('success', 'Project title has been saved successfully!');
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

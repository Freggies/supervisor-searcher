<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\ProjectTitle;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;


class UserController extends Controller
{

    public function Index()
    {
        $users = User::all();
        $lecturers = Lecturer::all();
    
        return view('dashboard', compact('users', 'lecturers'));
    }
    
    public function addSupervisor(Request $request)
    {    
        $request->validate([
            'id' => 'required|integer', // Make sure 'id' is provided and is an integer
            'lecturer_id' => 'required|string|max:255',            
        ]);  
    
        // Find the user by the provided 'id'
        $user = User::find($request->id);
    
        // Check if the user exists
        if (!$user) {
            return back()->withErrors(['message' => 'User not found']);
        }
    
        // Update the user's name
        $user->lecturer_id = $request->lecturer_id;
        $user->save();


    return redirect()->back()->with('success', 'Supervisor request sent.');
    }
    
    public function addPages(Request $request)
    {
        // Get the selected lecturer ID from the URL
        $selectedLecturerId = $request->query('lecturer');
    
        // Find the selected lecturer by ID
        $selectedLecturer = Lecturer::find($selectedLecturerId);
    
        // Check if the lecturer is found
        if (!$selectedLecturer) {
            abort(404); // You can customize this error response as needed
        }
    
        // You can pass the selected lecturer details to the view
        return view('supervisor.addsupervisor', ['selectedLecturer' => $selectedLecturer]);
    }  
    
    public function showLecturerDetails($lecturerId)
    {
        // Find the lecturer by ID
        $lecturer = Lecturer::find($lecturerId);
    
        // Check if the lecturer is found
        if (!$lecturer) {
            abort(404); // You can customize this error response as needed
        }
    
        // You can pass the lecturer details to the view
        return view('lecturer.details', ['lecturer' => $lecturer]);
    }

    public function gotowelcome(Request $request, User $users)
    {
        return view('welcome');
    }

    public function deleteSupervisee(Request $request)
    {    
        
        $request->validate([
            'lecturer_id' => 'required|exists:lecturers,id',
        ]);

        $user->lecturer_id = $request->lecturer_id;
        $user->save();

    
        return redirect()->back()->with('success', 'Lecturer ID updated successfully.');

    }

    
}

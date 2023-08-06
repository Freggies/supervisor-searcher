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
        $lecturers = request()->get('lecturers');

        return view('dashboard', compact('users'));
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
    

    public function addPages(Request $request, User $users)
    {
        return view('supervisor.addsupervisor');
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

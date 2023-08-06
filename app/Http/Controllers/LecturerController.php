<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Lecturer;
use App\Models\ProjectTitle;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use DB;

class LecturerController extends Controller
{
    public function Index()
    {
        $lecturers = Lecturer::all();
        $users = User::all();
        $users = request()->get('users');

        return view('lecturer.lecturer_login',compact('lecturers'));
    }

    public function showstudent()
    {
        
        $lecturerId = Auth::guard('lecturer')->user()->id; 

        $users = User::where('lecturer_id', $lecturerId)->get();
        
        return view('lecturer.lecturer_accept', compact('users'));
    }
    
    public function Dashboard(){

        return view('lecturer.index');
    }

    public function Login(Request $request){
        //dd($request->all());

        $check = $request->all();
        if(Auth::guard('lecturer')->attempt(['email' => $check ['email'], 'password'=> $check ['password']])){
            return redirect()->route('lecturer.dashboard')->with('error', 'Lecturer Login Successfully');
        }
        else{
            return back()->with('error','Invalid Email or Password');
        }
    }

    public function LecturerLogout(){

        Auth::guard('lecturer')->logout();
        return redirect()->route('login.form')->with('error', 'Lecturer Logout Successfully');
    }


    public function LecturerRegister(){

        return view('lecturer.lecturer_register');
    }

    public function LecturerRegisterCreate(Request $request){
        //dd($request->all());

        Lecturer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'project' => $request->project,
            'password' => Hash::make($request->password),
                  
        ]);

        return redirect()->route('login.form')->with('error', 'Lecturer Created Successfully');

    }

    public function showLecturers()
    {
        $lecturers = Lecturer::paginate(10); 
        $project_titles = ProjectTitle::paginate(10); 
        return view('supervisor.index', ['lecturers' => $lecturers, 'project_titles' => $project_titles]);  
        
        return Lecturer::find(1)->ProjectTitles;   
    }

    public function showSupervisorRequests()
    {
        $lecturer = Auth::user(); // Assuming the lecturer is the authenticated user
        $supervisorRequests = $lecturer->students()->where('status', 'pending')->get();
    
        return view('lecturer.supervisor-requests', ['supervisorRequests' => $supervisorRequests]);
    }
    
    public function viewrequest()
    {
        return view ('lecturer.lecturer_accept');
    }

    public function gotoupdate()
    {
        return view ('lecturer.lecturer-update');
    }

    public function update(Request $request)
    {
        $request->validate([ 
            'id' => 'required|integer',
            'name' => 'required|string|max:255', 
            'email' => 'required|string|max:255', 
            'password' => 'required|string|max:255',            
        ]);  
    
        // Find the user by the provided 'id'
        $lecturer = Lecturer::find($request->id);
    
        // Check if the user exists
        if (!$lecturer) {
            return back()->withErrors(['message' => 'User not found']);
        }
    
        // Update the user's name
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        if ($request->filled('password')) {
            $lecturer->password = bcrypt($request->password);
        }
        $lecturer->save();

    return redirect()->back()->with('success', 'Information Updated.');
    }

    public function deletePages(Request $request, User $users)
    {
        return view('lecturer.delete');
    }

    public function deleteSupervisee(Request $request)
    {    
        $request->validate([
            'id' => 'required|integer', // Make sure 'id' is provided and is an integer
            'lecturer_id' => 'required|string|max:255',            
        ]);  
    
        // Find the user by the provided 'id'
        $lecturers = Lecturer::find($request->id);
        // Check if the user exists
        if (!$lecturers) {
            return back()->withErrors(['message' => 'User not found']);
        }
    
        // Update the user's name
        $lecturers->lecturer_id = $request->lecturer_id;
        $lecturers->save();


    return redirect()->back()->with('success', 'Supervisor request sent.');
    }

    
}

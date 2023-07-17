<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Lecturer;
use App\Models\ProjectTitle;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LecturerController extends Controller
{
    public function Index(){
        return view('lecturer.lecturer_login');
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



}

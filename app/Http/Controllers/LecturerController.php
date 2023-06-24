<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Lecturer;
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
            'password' => Hash::make($request->password),
                  
        ]);

        return redirect()->route('login.form')->with('error', 'Lecturer Created Successfully');

    }

}

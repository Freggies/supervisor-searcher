<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ProjectTitleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';

//Admin Route
Route::prefix('lecturer')->group(function(){

    Route::get('/login',[LecturerController::class, 'Index'])->name('login.form');
    Route::post('/login/owner',[LecturerController::class, 'Login'])->name('lecturer.login');
    Route::get('/dashboard',[LecturerController::class, 'Dashboard'])->name('lecturer.dashboard')->middleware('lecturer');
    Route::get('/logout',[LecturerController::class, 'LecturerLogout'])->name('lecturer.logout')->middleware('lecturer');
    Route::get('/register',[LecturerController::class, 'LecturerRegister'])->name('lecturer.register')->middleware('lecturer');
    Route::post('/register/create',[LecturerController::class, 'LecturerRegisterCreate'])->name('lecture.register.create')->middleware('lecturer'); 
    Route::get('/projects/create',[ProjectTitleController::class, 'CreateProject'])->name('projecttitle.create');
    Route::post('/projects',[ProjectTitleController::class, 'StoreProject'])->name('projecttitle.store');
    Route::get('/updates', [LecturerController::class, 'gotoupdate'])->name('lecturer.updatepage');
    Route::post('/update', [LecturerController::class, 'update'])->name('lecturer.update');
    Route::get('/accept', [LecturerController::class, 'viewrequest'])->name('lecturer.accept');
    Route::get('/showstudent', [LecturerController::class, 'showstudent'])->name('show.student');
    Route::get('/deletestudent', [LecturerController::class, 'deletePages'])->name('delete.student');
   
 
});

Route::prefix('supervisor')->group(function(){
Route::get('/listofsupervisor', [LecturerController::class, 'showLecturers'])->name('supervisor.index');

});
Route::get('/welcome', [UserController::class, 'gotowelcome'])->name('gotowelcomes');
Route::post('/deletesupervisee', [UserController::class, 'deleteSupervisee'])->name('delete.supervisee'); 
Route::post('/add-supervisor',[UserController::class, 'addSupervisor'])->name('add-supervisor');
Route::get('/add-supervisor',[UserController::class, 'addSupervisor'])->name('add-supervisor');
Route::post('/addpages',[UserController::class, 'addPages'])->name('addpages');
Route::get('/addpages',[UserController::class, 'addPages'])->name('addpages');










<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\ProjectTitle;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserController extends Controller
{
    public function addFriend($userId, $lecturerId)
{
    $user = User::findOrFail($userId);
    $lecturer = Lecturer::findOrFail($lecturerId);

    $user->lecturers()->create(['lecturer_id' => $lecturer->id]);

    return response()->json([
        'message' => 'Lecturer added as a friend successfully'
    ]);
}
}

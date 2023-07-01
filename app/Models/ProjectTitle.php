<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTitle extends Model
{
    protected $fillable = ['title'];

    // Define the relationship with Supervisor
    public function lecturers()
    {
        return $this->belongsTo(Lecturer::class);
    }
}

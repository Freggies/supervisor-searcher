<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTitle extends Model
{
    protected $fillable = [
        'id',
        'title',    
        'lecturer_id'
    ];

   
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}

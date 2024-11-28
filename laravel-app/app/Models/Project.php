<?php
// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects'; // Ensure this matches your database table name
    protected $primaryKey = 'project_id'; // Specify the primary key
    public $timestamps = false; // Disable timestamps if not used

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'kelompok_id',
        'user_id',
    ];
    protected $dates = ['deadline'];


    // Relationship with Kelompok
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'projects_id', 'project_id');
    }

    // Relationship with Tasks
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'project_id'); // Ensure the foreign key matches your Task model
    }
}

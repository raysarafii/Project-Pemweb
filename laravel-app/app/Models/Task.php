<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify the table name if it does not follow Laravel's naming conventions
    protected $table = 'tasks'; // Ensure this matches your actual database table name
    public $timestamps = false;

    // Set the primary key
    protected $primaryKey = 'task_id';

    // Disable auto-incrementing if task_id is not auto-incrementing
    public $incrementing = false; // Set to true if task_id is auto-incrementing

    // Specify the fillable fields for mass assignment
    protected $fillable = ['task_id', 'project_id', 'assigned_to', 'name', 'priority', 'status','kelompok_id'];

    // Define the relationship with the Project model
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id'); // Adjust the foreign key if needed
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to'); // Ensure 'assigned_to' is the correct foreign key
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id'; // Specify the primary key if it's not 'id'
    public $timestamps = false; // Set to true if using created_at and updated_at

    // Define the relationship with the Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'projects_id', 'project_id');
    }

    // Define the relationship with the User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // Import the Notifiable trait

class User extends Authenticatable
{
    use Notifiable; // Add the Notifiable trait

    protected $fillable = ['name', 'email', 'password', 'kelompok_id'];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'kelompok_id');
    }
}

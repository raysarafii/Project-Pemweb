<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';
    protected $primaryKey = 'kelompok_id';
    protected $fillable = ['name'];
    public $timestamps = false; // Menonaktifkan timestamps
}

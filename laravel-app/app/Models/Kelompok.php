<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'kelompok'; 

    // Tentukan primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'kelompok_id'; 

    // Tentukan apakah timestamps digunakan
    public $timestamps = false; 

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = ['name']; // Tambahkan 'name' di sini
}

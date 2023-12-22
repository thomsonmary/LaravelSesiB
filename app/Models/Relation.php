<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    protected $table = 'relations';
    protected $fillable = [
        'mahasiswa_npm',
        'dosen_nidn',
        'matakuliah_kode',
        'semester',
        'status_aktif',
    ];

}

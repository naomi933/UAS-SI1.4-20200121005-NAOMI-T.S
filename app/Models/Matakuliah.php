<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = "matakuliah";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_matakuliah', 'sks', 'matakuliah'
    ];

    public function JadwalKuliah()
    {
        return $this->hasMany(JadwalKuliah::class);
    }
    public function Absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}

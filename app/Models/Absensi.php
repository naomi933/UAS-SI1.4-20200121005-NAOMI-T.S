<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'keterangan', 'mahasiswa_id'
    ];

    public function Matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
    
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}

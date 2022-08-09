<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'jadwal', 'nama_matakuliah_id', 'matakuliah_id'
    ];

    public function Matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}

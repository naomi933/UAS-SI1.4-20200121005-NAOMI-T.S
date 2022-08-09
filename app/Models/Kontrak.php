<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $table = "kontrak";
    protected $fillable = [
        'id', 'mahasiswa_id', 'semester_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bulanModel extends Model
{
    use HasFactory;
    protected $table = 'bulan';
    protected $fillable = [
        'id',
        'nama_bulan',
        'created_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presence extends Model
{
    use HasFactory;
    protected $table = 'table_present';
    protected $fillable = [
        'user_id',
        'bulan_id',
        'presence',
        'total_presence',
    ];
}

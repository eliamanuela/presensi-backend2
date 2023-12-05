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
        'bulan_karyawan',
        'presence',
        'total_presence',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bulanModel()
    {
        return $this->belongsTo(BulanModel::class, 'bulan_id', 'id');
    }
}

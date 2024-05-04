<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey ='id';

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey ='id';

    public function karyawan(){
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}

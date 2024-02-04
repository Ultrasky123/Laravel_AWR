<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owners extends Model
{
    use HasFactory;
    protected $table = 'owners';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;
    protected $fillable = [
        'nokartu','nama_pengguna','pangkat','NRP','jabatan','kesatuan','id_senjata'
    ];
}

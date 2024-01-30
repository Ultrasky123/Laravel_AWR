<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tmploadcells extends Model
{
    use HasFactory;
    protected $table = 'tmploadcells';
    protected $primarykey = 'id_senjata';
    protected $fillable = [
        'status','berat'
    ];
}

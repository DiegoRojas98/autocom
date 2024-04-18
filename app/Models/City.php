<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "citys";

    public function departament()
    {
        return $this->belongsTo(Departament::class,'id_departament');
    }
}

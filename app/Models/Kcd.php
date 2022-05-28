<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kcd extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profilkcd(){
        return $this->hasMany(ProfilKcd::class);
    }
}
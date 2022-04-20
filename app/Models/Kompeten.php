<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompeten extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public function kompetensikeahlian(){
        return $this->belongsTo(Kompetensikeahlain::class);
    }

    public function komli(){
        return $this->belongsTo(Komli::class);
    }
}
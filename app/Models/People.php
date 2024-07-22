<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $guarded = [];


    // reference
    public function kades()
    {
        return $this->hasMany(Kades::class);
    }

    public function kadesPeriode()
    {
        return $this->hasMany(KadesPeriode::class);
    }

}

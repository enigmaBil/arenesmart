<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function quartiers()
    {
        return $this->hasMany(Quartier::class);
    }

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}

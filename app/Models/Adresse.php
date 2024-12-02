<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = ['city_id', 'po_box'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function stadiums()
    {
        return $this->hasMany(Stadium::class);
    }
}

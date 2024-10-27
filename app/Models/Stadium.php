<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    protected $table = 'stadiums';
    protected $fillable = ['name', 'capacity', 'adresse_id', 'activity_id', 'equipment_id'];

    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

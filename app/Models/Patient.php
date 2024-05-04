<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patient";
    protected $guarded = [];
    public $timestamps = false;

    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table = "utilisateur";

    protected $guarded = [];
    public $timestamps = false;


    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}

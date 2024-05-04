<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use Illuminate\support\Facades\Hash;


class PatientSessionController extends Controller
{
    public function store()
    {
        $patient = request()->validate([
            "email" => ["required", "email"],
            "mot_passe" => ["required", Password::min(8)->letters()->numbers()->max(255)]
        ]);

        if ($patient["email"] === $_SESSION["email"] && Hash::make($patient["mot_passe"], [ 'rounds' => 12, ]) === $_SESSION["mot_passe"])
        {
            return $patient;
        }
    }
}

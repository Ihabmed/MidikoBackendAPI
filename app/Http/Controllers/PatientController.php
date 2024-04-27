<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(Request $request)
    {
        request()->validateWithBag("PatientSignUp", [
            "nom" => ["bail", "required", "min:3", "max:25"],
            "email" => ["bail", "email:rfc,dns", "required", "unique", "max:45"],
            "mot_passe" => ["required", "max:25"]
        ]);
    }
}

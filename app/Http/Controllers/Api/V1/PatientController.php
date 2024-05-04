<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Http\Resources\PatientResource;
use Illuminate\Validation\Rules\Enum;
use App\Http\Controllers\Api\V1\UtilisateurController;


class PatientController extends Controller
{
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }

    public function store(UtilisateurController $utilisateurController)
    {
        $patient = request()->validate([
            "prenom" => ["required", "bail", "string", "max:25"],
            "sexe" => [new Enum("Sexe")],
            "date_naissance" => ["required", "date"],
            "image" => ["max:25"]
        ]);

        $utilisateur = $utilisateurController->store("patient");
        $patient["id_utilisateur"] = $utilisateur->id;
        $patient["nom"] = $utilisateur->nom;

        return Patient::create($patient);
    }
    
    public function put()
    {
        $patient = request()->validate([
            "prenom" => ["required", "bail", "string", "max:25"],
            "sexe" => [new Enum("Sexe")],
            "date_naissance" => ["required", "date"],
            "image" => ["max:25"]
        ]);
    }
}

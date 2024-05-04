<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use App\Models\Utilisateur;
use Illuminate\support\Facades\Hash;


class UtilisateurController extends Controller
{
    public function store($type){
        $utilisateur = request()->validate([
            "nom" => ["required", "bail", "string", "max:25"],
            "email" => ["required", "email", "unique:utilisateur,email,except,id"],
            "mot_passe" => ["required", Password::min(8)->letters()->numbers()->max(255)],
        ]);

        $utilisateur["type"] = $type;
        $utilisateur["mot_passe"] = Hash::make($utilisateur["mot_passe"], [ 'rounds' => 12, ]);

        return Utilisateur::create($utilisateur);
    }

    public function put(Utilisateur $util, $id)
    {
        $utilisateur1 = request()->validate([
            "nom" => ["required", "bail", "string", "max:25"],
            "email" => ["required", "email", "unique:utilisateur,email,except,id"],
            "mot_passe" => ["required", Password::min(8)->letters()->numbers()->max(255)],
        ]);

        $utilisateur1["mot_passe"] = Hash::make($utilisateur1["mot_passe"], [ 'rounds' => 12, ]);

        $utilisateur = Utilisateur::find($id);

        $utilisateur = $utilisateur1;

        return $util->save($utilisateur);
    }
}

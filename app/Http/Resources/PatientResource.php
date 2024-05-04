<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "sexe" => $this->sexe,
            "sang" => $this->sang,
            "date_naissance" => $this->date_naissance,
            "image" => $this->image,
            "bio" => $this->bio,
            "utilisateur_id" => $this->utilisateur_id
        ];
    }
}

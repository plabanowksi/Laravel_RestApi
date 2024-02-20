<?php

namespace App\Http\ValidationRules;

class PetUpdatePetWithFormDataValidationRules{

    public static function getRules(): array{

        return  [
            'petId' => 'required|integer|min:1',
            'name' => 'nullable|string',
            'status' => 'nullable|string|in:available,pending,sold'

        ];
    }
}
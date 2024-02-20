<?php

namespace App\Http\ValidationRules;

class PetIdValidationRules{

    public static function getRules(): array{

        return  [
            'petId' => 'required|int|min:1',
        ];
    }
}
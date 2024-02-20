<?php

namespace App\Http\ValidationRules;

class PetFindByStatusValidationRules{

    public static function getRules(): array{

        return  [
            'status' => 'required|array',
            'status.*' => 'string|in:available,pending,sold'
        ];
    }
}
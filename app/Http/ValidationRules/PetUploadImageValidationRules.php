<?php

namespace App\Http\ValidationRules;

class PetUploadImageValidationRules{

    public static function getRules(): array{

        return  [
            'petId' => 'required|integer|min:0',
            'additionalMetadata' => 'nullable|string',
            'file' => 'nullable|file',
        ];
    }
}
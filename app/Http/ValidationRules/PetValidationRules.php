<?php

namespace App\Http\ValidationRules;

class PetValidationRules{

    public static function getRules(): array{

        return  [
            'id' => 'nullable|integer|min:0',
            'category' => 'nullable|array',
            'category.*.id' => 'nullable|integer',
            'category.*.name' => 'nullable|string',
            'name' => 'required|string|min:3|max:32',
            'photoUrls' => 'required|array',
            'photoUrls.*' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|array',
            'tags.*.id' => 'nullable|integer',
            'tags.*.name' => 'nullable|string',
            'status' => 'nullable|string|in:available,pending,sold'
        ];
    }
}
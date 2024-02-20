<?php

namespace App\Http\DTOs;

class ApiResponseDTO
{
    public ?int $code;
    public ?string $type;
    public ?string $message;

    public function __construct(?int $code = null, ?string $type = 'application/json', ?string $message = null)
    {
        $this->code = $code;
        $this->type = $type;
        $this->message = $message;
    }
}
<?php
namespace App\Http\DTOs;

class CategoryDTO
{
    public ?int $id;
    public ?string $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '0';
        $this->name = $data['name'] ?? 'string';
    }
}
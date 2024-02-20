<?php
namespace App\Http\DTOs;
use App\Http\DTOs\TagDTO;
use App\Http\DTOs\CategoryDTO;

class PetDTO
{
    public ?int $id;
    public ?CategoryDTO $category;
    public ?string $name;
    public ?array $photoUrls;
    public ?array $tags;
    public ?string $status;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;

        if(!empty($data['category']))
            $this->category = new CategoryDTO($data['category']);
        else
            $this->category = null;

        $this->name = $data['name'] ?? null;
        $this->photoUrls = $data['photoUrls'] ?? [];
        $this->tags = $this->createTags($data['tags'] ?? []);
        $this->status = $data['status'] ?? null;
    }
    
    private function createTags(array $data) : array
    {
        $tags = [];
        if(!empty($tags)){
            foreach($data as $task) {
                $tags[] = new TagDTO($task);
            }
            return $tags;
        }
        return [];
    }
}
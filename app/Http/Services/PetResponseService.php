<?php

namespace App\Http\Services;
use App\Http\DTOs\ApiResponseDTO;
use Illuminate\Http\Client\Response;

class PetResponseService 
{
    public function getData(Response $response) {
    if ($response->successful()) {
        $data = $response->json();
        $dto = response()->json($data);
    } else {
        $error = 'Failed to fetch data';
        $dto = new ApiResponseDTO(500,'', $error);
    }

    return response()->json($dto);
    }

}
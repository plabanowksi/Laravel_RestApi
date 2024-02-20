<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Services\PetService;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    private PetService $petService;

    public  function __construct(PetService $petService) {
        $this->petService = $petService;
    }
    public function uploadImage(Request $request): View{
        return $this->petService->uploadImage($request);
    }
    public function showuploadImageView(): View{
        return view('uploadImage');
    }
    
    public function addNewPet(Request $request): View{
        return $this->petService->addNewPet($request);
    }

    public function showAddNewPetView():view {
        return view('addNewPet');
    }

    public function updatePet(Request $request): View{
        return $this->petService->updatePet($request);
    }
    
    public function showUpdatePetView():View {
        return view('updatePet');
    }

    public function findByStatus(Request $request): View{
        return $this->petService->findByStatus($request);
    }

    public function findPetById(Request $request): View{
        return $this->petService->findPetById($request);
    }

    public function updatePetWithFormData(Request $request): View{
        return $this->petService->updatePetWithFormData($request);
    }

    public function deletePet(Request $request): View{
        return $this->petService->deletePet($request);
    }
}
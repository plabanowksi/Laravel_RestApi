<?php

namespace App\Http\Services;
use App\Http\Services\PetResponseService;
use App\Http\DTOs\PetDTO;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\ValidationRules\PetValidationRules;
use App\Http\ValidationRules\PetIdValidationRules;
use App\Http\ValidationRules\PetUploadImageValidationRules;
use App\Http\ValidationRules\PetFindByStatusValidationRules;
use App\Http\ValidationRules\PetUpdatePetWithFormDataValidationRules;

class PetService 
{
    private $baseAppUrl;
    private PetResponseService $petResponseService;

    public  function __construct(PetResponseService $petResponseService) {
        $this->petResponseService = $petResponseService;
        $this->baseAppUrl = env('BASE_API_URL');
    }
    
    public function uploadImage(Request $request): View{
        $data = null;
        $petId = $request->query('petId');
        $requestAll = $request->all();
        if (!empty($requestAll)) {
            $validator = Validator::make($requestAll, PetUploadImageValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else {
                $petId = $requestAll['petId'];
                $data = [
                    'petId' => $requestAll['petId'],
                    'additionalMetadata' => $requestAll['additionalMetadata'],
                ];
        
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $fileName = $file->getClientOriginalName();
                    $filePath = $file->path();
                }
            }
        }
        if (!empty($data)) {
            $response = Http::attach('file', file_get_contents($filePath), $fileName)
            ->post("{$this->baseAppUrl}/pet/{$petId}/uploadImage", $data, [
                'Accept' => 'application/json',
                'Content-Type' => 'multipart/form-data',
            ]);
            $data = $this->petResponseService->getData($response);
        }
    
        return view('uploadImage', ['data' => $data, 'petId' => $petId]);
    }

    public function addNewPet(Request $request):view {
        $data = null;
        $json_data = $request->input('json_data');
        $requestData = $json_data;
        if (!empty($requestData)) {
            $requestData = json_decode($requestData, true);
            $validator = Validator::make($requestData, PetValidationRules::getRules());
            if ($validator->fails()) {
               dd($validator->errors());
            } else {
            $petDTO = new PetDTO($requestData);
            $response = Http::post("{$this->baseAppUrl}/pet", (array) $petDTO);
            $data = $this->petResponseService->getData($response);
            }
        }
        return view('addNewPet', ['data'=>$data,'jsonText' => $json_data]);
    }
    public function updatePet(Request $request):View {
        $data = null;
        $json_data = $request->input('json_data');
        $requestData = $json_data;
        if (!empty($requestData)) {
            $validateData = json_decode($requestData, true);
            $validator = Validator::make($validateData, PetValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else {
            $petDTO = new PetDTO($validateData);
            $response = Http::put("{$this->baseAppUrl}/pet", (array) $petDTO);
            $data = $this->petResponseService->getData($response);
            }
        }
        return view('updatePet', ['data' => $data, 'jsonText' => $json_data]);
    }
    public function findByStatus(Request $request):View {
        $data = null;
        $statuses = $request->input('status', []);
        if(!empty($statuses)){
            $queryParameters = [];
            $validator = Validator::make(['status' => $statuses], PetFindByStatusValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else{
                foreach ($statuses as $value) {
                    $queryParameters[] = 'status=' . urlencode($value);
                }
                $queryString = implode('&', $queryParameters);
                $finalUrl = $this->baseAppUrl .'/pet/findByStatus'. '?' . $queryString;
                $response = Http::get($finalUrl);
                $data = $this->petResponseService->getData($response);
            }
        }
        return view('findByStatus',['data' => $data]);
    }
    public function findPetById(Request $request):View {
        $data = null;
        $petId = $request->query('petId');

        if(!empty($petId)){
            $validator = Validator::make(['petId' => $petId], PetIdValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else{
            $response = Http::get("{$this->baseAppUrl}/pet/{$petId}");
            $data = $this->petResponseService->getData($response);
            }
        }
        return view('findPetById', ['data' => $data,'petId'=>$petId]);
    }
    
    public function updatePetWithFormData(Request $request):View {
        $data = null;
        $petId = $request->query('petId');
        $requestAll = $request->all();
        if(!empty($requestAll)){
            $tempArray=[
                'petId' => $requestAll['petId'],
                'name' => $requestAll['name'],
                'status' => $requestAll['status']
            ];
            $validator = Validator::make($tempArray, PetUpdatePetWithFormDataValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else{
                $response = Http::post("{$this->baseAppUrl}/pet/{$petId}",$tempArray);
                $data = $this->petResponseService->getData($response);
            }
        }
        return view('updatePetWithFormData', ['data' => $data]);
    }

    public function deletePet(Request $request):View {
        $data = null;
        $petId = $request->query('petId');

        if(!empty($petId)){
            $validator = Validator::make(['petId' => $petId], PetIdValidationRules::getRules());
            if ($validator->fails()) {
                dd($validator->errors());
            } else{
                $response = Http::delete("{$this->baseAppUrl}/pet/{$petId}");
                $data = $this->petResponseService->getData($response);
            }
        }
        return view('deletePet', ['data' => $data,'petId'=>$petId]);
    }
}
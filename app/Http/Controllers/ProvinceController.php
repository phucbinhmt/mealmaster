<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ProvinceServiceInterface;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $provinceService;

    public function __construct(ProvinceServiceInterface $provinceService)
    {
        $this->provinceService = $provinceService;
    }

    public function getAllProvinces()
    {
        $provinces = $this->provinceService->getAllProvinces();
        return response()->json($provinces);
    }
}

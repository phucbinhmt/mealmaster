<?php

namespace App\Http\Controllers;

use App\Services\Contracts\DistrictServiceInterface;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $districtService;

    public function __construct(DistrictServiceInterface $districtService)
    {
        $this->districtService = $districtService;
    }

    public function getAllDistricts()
    {
        $districts = $this->districtService->getAllDistricts();
        return response()->json($districts);
    }

    public function getDistrictsByProvinceId($provinceId)
    {
        $districts = $this->districtService->getDistrictsByProvinceId($provinceId);
        return response()->json($districts);
    }
}

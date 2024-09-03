<?php

namespace App\Http\Controllers;

use App\Services\Contracts\WardServiceInterface;
use Illuminate\Http\Request;

class WardController extends Controller
{
    protected $wardService;

    public function __construct(WardServiceInterface $wardService)
    {
        $this->wardService = $wardService;
    }

    public function getAllWards()
    {
        $wards = $this->wardService->getAllWards();
        return response()->json($wards);
    }

    public function getWardsByDistrictId($districtId)
    {
        $wards = $this->wardService->getWardsByDistrictId($districtId);
        return response()->json($wards);
    }
}

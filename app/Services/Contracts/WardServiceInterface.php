<?php

namespace App\Services\Contracts;

interface WardServiceInterface
{
    public function getAllWards();
    public function getWardsByDistrictId($districtId);
}

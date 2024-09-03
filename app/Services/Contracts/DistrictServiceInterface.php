<?php

namespace App\Services\Contracts;

interface DistrictServiceInterface
{
    public function getAllDistricts();
    public function getDistrictsByProvinceId($provinceId);
}

<?php

namespace App\Services;

use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Services\Contracts\DistrictServiceInterface;

class DistrictService implements DistrictServiceInterface
{
    protected $districtRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getAllDistricts()
    {
        return $this->districtRepository->all();
    }

    public function getDistrictsByProvinceId($provinceId)
    {
        return $this->districtRepository->getDistrictsByProvinceId($provinceId);
    }
}

<?php

namespace App\Services;

use App\Repositories\Contracts\ProvinceRepositoryInterface;
use App\Services\Contracts\ProvinceServiceInterface;

class ProvinceService implements ProvinceServiceInterface
{
    protected $provinceRepository;

    public function __construct(ProvinceRepositoryInterface $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function getAllProvinces()
    {
        return $this->provinceRepository->all();
    }
}

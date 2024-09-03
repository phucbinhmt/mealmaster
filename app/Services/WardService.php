<?php

namespace App\Services;

use App\Repositories\Contracts\WardRepositoryInterface;
use App\Services\Contracts\WardServiceInterface;

class WardService implements WardServiceInterface
{
    protected $wardRepository;

    public function __construct(WardRepositoryInterface $wardRepository)
    {
        $this->wardRepository = $wardRepository;
    }

    public function getAllWards()
    {
        return $this->wardRepository->all();
    }

    public function getWardsByDistrictId($districtId)
    {
        return $this->wardRepository->getWardsByDistrictId($districtId);
    }
}

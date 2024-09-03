<?php

namespace App\Repositories\Contracts;

interface DistrictRepositoryInterface extends BaseRepositoryInterface
{
    public function getDistrictsByProvinceId($provinceId);
}

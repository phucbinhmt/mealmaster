<?php

namespace App\Repositories\Contracts;

interface WardRepositoryInterface extends BaseRepositoryInterface
{
    public function getWardsByDistrictId($districtId);
}

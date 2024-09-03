<?php

namespace App\Repositories;

use App\Models\Ward;
use App\Repositories\Contracts\WardRepositoryInterface;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    public function __construct(Ward $ward)
    {
        parent::__construct($ward);
    }

    public function getWardsByDistrictId($districtId)
    {
        return $this->model->where('district_id', $districtId)->get();
    }
}

<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\Contracts\DistrictRepositoryInterface;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function __construct(District $district)
    {
        parent::__construct($district);
    }

    public function getDistrictsByProvinceId($provinceId)
    {
        return $this->model->where('province_id', $provinceId)->get();
    }
}

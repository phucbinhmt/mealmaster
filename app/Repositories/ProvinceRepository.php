<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\Contracts\ProvinceRepositoryInterface;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    public function __construct(Province $province)
    {
        parent::__construct($province);
    }

    // Add any additional methods specific to the Province entity here
}

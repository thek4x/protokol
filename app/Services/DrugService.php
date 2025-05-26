<?php

namespace App\Services;

use App\Models\Drug;

class DrugService
{
    public function createDrug($data)
    {
        $create = Drug::create($data->toArray());
        return $create;
    }

    public function listBy()
    {
        return Drug::withTitles()->get();
    }
}

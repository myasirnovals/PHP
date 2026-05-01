<?php

namespace App\Controllers;

use App\Models\CityModel;

class City extends BaseController
{
    public function index(): string
    {
        $cityModel = model(CityModel::class);

        return view('city', [
            'city' => $cityModel->getCity(),
        ]);
    }
}
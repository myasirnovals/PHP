<?php

namespace App\Controllers;

use App\Models\CountryModel;

class Country extends BaseController
{
    public function index(): string
    {
        $countryModel = model(CountryModel::class);

        return view('country', [
            'country' => $countryModel->getCountry(),
        ]);
    }
}
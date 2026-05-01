<?php

namespace App\Controllers;

use App\Models\LanguageModel;

class Language extends BaseController
{
    public function index(): string
    {
        $languageModel = model(LanguageModel::class);

        return view('language', [
            'language' => $languageModel->getLanguage(),
        ]);
    }
}
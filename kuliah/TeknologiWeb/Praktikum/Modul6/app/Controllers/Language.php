<?php

namespace App\Controllers;

use App\Models\LanguageModel;
use App\Models\CountryModel;

class Language extends BaseController
{
    protected $languageModel;

    public function __construct()
    {
        $this->languageModel = new LanguageModel();
    }

    public function index()
    {
        $data['list_bahasa'] = $this->languageModel->findAll();

        return view('language/index', $data);
    }

    public function tambah()
    {
        $countryModel = new CountryModel();
        $data['negara'] = $countryModel->findAll();

        return view('language/tambah', $data);
    }

    public function simpan()
    {
        $this->languageModel->insert([
            'CountryCode' => $this->request->getPost('kode_negara'),
            'Language'    => $this->request->getPost('bahasa'),
            'IsOfficial'  => $this->request->getPost('is_resmi'),
            'Percentage'  => $this->request->getPost('persentase'),
        ]);

        return redirect()->to('/language');
    }

    public function edit($countryCode, $language)
    {
        $countryModel = new CountryModel();
        $countryCode = rawurldecode($countryCode);
        $language = rawurldecode($language);

        $data = [
            'bahasa' => $this->languageModel
                ->where('CountryCode', $countryCode)
                ->where('Language', $language)
                ->first(),
            'negara' => $countryModel->findAll(),
        ];

        return view('language/edit', $data);
    }

    public function update($countryCode, $language)
    {
        $countryCode = rawurldecode($countryCode);
        $language = rawurldecode($language);

        $this->languageModel
            ->where('CountryCode', $countryCode)
            ->where('Language', $language)
            ->set([
                'CountryCode' => $this->request->getPost('kode_negara'),
                'Language'    => $this->request->getPost('bahasa'),
                'IsOfficial'  => $this->request->getPost('is_resmi'),
                'Percentage'  => $this->request->getPost('persentase'),
            ])
            ->update();

        return redirect()->to('/language');
    }

    public function hapus($countryCode, $language)
    {
        $countryCode = rawurldecode($countryCode);
        $language = rawurldecode($language);

        $data['bahasa'] = $this->languageModel
            ->where('CountryCode', $countryCode)
            ->where('Language', $language)
            ->first();

        return view('language/hapus', $data);
    }

    public function proses_hapus($countryCode, $language)
    {
        $countryCode = rawurldecode($countryCode);
        $language = rawurldecode($language);

        $this->languageModel
            ->where('CountryCode', $countryCode)
            ->where('Language', $language)
            ->delete();

        return redirect()->to('/language');
    }
}

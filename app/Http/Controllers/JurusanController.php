<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function show($jurusan)
    {
        $jurusanInfo = $this->getJurusanInfo($jurusan);
        return view('jurusan.show', compact('jurusanInfo'));
    }

    private function getJurusanInfo($jurusan)
    {
        $info = [
            'pplg' => [
                'name' => 'PPLG',
                'title' => 'Pengembangan Perangkat Lunak dan Gim',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => asset('storage/logos/pplg.png')
            ],
            'tflm' => [
                'name' => 'TFLM',
                'title' => 'Teknik Fabrikasi Logam dan Manufaktur',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'image' => asset('storage/logos/tflm.jpeg')
            ],
            'tjkt' => [
                'name' => 'TJKT',
                'title' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'image' => asset('storage/logos/tjkt.png')
            ],
            'tkr' => [
                'name' => 'TKR',
                'title' => 'Teknik Kendaraan Ringan',
                'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'image' => asset('storage/logos/tkr.png')
            ]
        ];

        return $info[$jurusan] ?? null;
    }
} 
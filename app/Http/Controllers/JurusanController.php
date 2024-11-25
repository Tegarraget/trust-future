<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan.index', compact('jurusans'));
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Jurusan updated successfully.');
    }

    public function pplg()
    {
        $data = [
            'title' => 'PPLG',
            'fullTitle' => 'PPLG - Pengembangan Perangkat Lunak dan Gim',
            'logoPath' => 'storage/logos/pplg.png',
            'description' => 'Pengembangan Perangkat Lunak dan Gim adalah jurusan yang fokus pada pembuatan dan pengembangan aplikasi serta permainan digital...',
            'features' => [
                ['title' => 'Kurikulum Berbasis Industri', 'description' => 'Materi pembelajaran disesuaikan dengan kebutuhan industri terkini...'],
                ['title' => 'Praktik Langsung', 'description' => 'Siswa akan banyak melakukan praktik langsung...'],
                ['title' => 'Fasilitas Modern', 'description' => 'Dilengkapi dengan laboratorium komputer modern...']
            ],
            'photos' => $this->getPhotos('jurusan/pplg')
        ];

        return view('jurusan.template', $data);
    }

    private function getPhotos($path)
    {
        if (!Storage::disk('public')->exists('photos/' . $path)) {
            return collect([]);
        }

        return collect(Storage::disk('public')->files('photos/' . $path))
            ->map(function($file) {
                return [
                    'name' => basename($file),
                    'path' => Storage::url($file)
                ];
            });
    }

    public function tjkt()
    {
        $data = [
            'title' => 'TJKT',
            'fullTitle' => 'TJKT - Teknik Jaringan Komputer dan Telekomunikasi',
            'logoPath' => 'storage/logos/tjkt.png',
            'description' => 'Teknik Jaringan Komputer dan Telekomunikasi adalah jurusan yang fokus pada pengelolaan infrastruktur jaringan, keamanan sistem, dan teknologi telekomunikasi...',
            'features' => [
                ['title' => 'Sertifikasi Internasional', 'description' => 'Persiapan untuk sertifikasi jaringan yang diakui secara internasional...'],
                ['title' => 'Laboratorium Lengkap', 'description' => 'Dilengkapi dengan peralatan jaringan modern dan simulator...'],
                ['title' => 'Kerjasama Industri', 'description' => 'Bekerjasama dengan perusahaan IT terkemuka...']
            ],
            'photos' => $this->getPhotos('jurusan/tjkt')
        ];

        return view('jurusan.template', $data);
    }

    public function tflm()
    {
        $data = [
            'title' => 'TFLM',
            'fullTitle' => 'TFLM - Teknik Fabrikasi Logam dan Manufaktur',
            'logoPath' => 'storage/logos/tflm.jpeg',
            'description' => 'Teknik Fabrikasi Logam dan Manufaktur adalah jurusan yang memfokuskan pada pengolahan logam dan proses manufaktur...',
            'features' => [
                ['title' => 'Bengkel Modern', 'description' => 'Dilengkapi dengan peralatan pengelasan dan manufaktur terkini...'],
                ['title' => 'Praktik Industri', 'description' => 'Kesempatan magang di industri manufaktur dan fabrikasi...'],
                ['title' => 'Sertifikasi Keahlian', 'description' => 'Program sertifikasi untuk berbagai keahlian teknik...']
            ],
            'photos' => $this->getPhotos('jurusan/tflm')
        ];

        return view('jurusan.template', $data);
    }

    public function tkr()
    {
        $data = [
            'title' => 'TKR',
            'fullTitle' => 'TKR - Teknik Kendaraan Ringan',
            'logoPath' => 'storage/logos/tkr.png',
            'description' => 'Teknik Kendaraan Ringan adalah jurusan yang fokus pada perawatan dan perbaikan kendaraan bermotor...',
            'features' => [
                ['title' => 'Bengkel Otomotif Modern', 'description' => 'Dilengkapi dengan peralatan diagnostik dan perbaikan kendaraan terkini...'],
                ['title' => 'Kerjasama Dealer', 'description' => 'Bekerjasama dengan dealer resmi untuk program praktik...'],
                ['title' => 'Teknologi Hybrid', 'description' => 'Pembelajaran mencakup teknologi kendaraan konvensional dan hybrid...']
            ],
            'photos' => $this->getPhotos('jurusan/tkr')
        ];

        return view('jurusan.template', $data);
    }

    // Dan seterusnya untuk jurusan lainnya...
} 
<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ApiController extends BaseController
{
    protected $soalModel;
    protected $siswaModel;
    protected $pengaturanModel;
    protected $dataPostTestModel;
    protected $dataPreTestModel;

    public function __construct()
    {
        $this->soalModel = new \App\Models\SoalModel();
        $this->siswaModel = new \App\Models\DataSiswaModel();
        $this->pengaturanModel = new \App\Models\PengaturanModel();
        $this->dataPostTestModel = new \App\Models\DataPostest();
        $this->dataPreTestModel = new \App\Models\DataPreTest();
    }

    public function index()
    {
        $data = $this->soalModel->orderBy('id', 'DESC')->findAll();

        // return json
        return $this->response->setJSON($data);
    }

    public function readPreTest()
    {
        $data = $this->soalModel->where('jenis_soal', 'Pre-Test')
            ->findAll();

        // return json
        return $this->response->setJSON($data);
    }
    public function readPostTest()
    {
        $data = $this->soalModel->where('jenis_soal', 'Post-Test')
            ->findAll();

        // return json
        return $this->response->setJSON($data);
    }
    public function readSoal()
    {
        $data = $this->soalModel->orderBy('id', 'DESC')->findAll();

        // return json
        return $this->response->setJSON($data);
    }

    public function readSoalById($id)

    {
        $data = $this->soalModel->find($id);
        if ($data) {
            // return json
            return $this->response->setJSON($data);
        }

        $data = [
            'message' => 'Data tidak ditemukan'
        ];
        // return json
        return $this->response->setJSON($data);
    }

    public function readSoalPost()
    {
        $id = $this->request->getPost('id');

        $data = $this->soalModel->find($id);
        // return json
        return $this->response->setJSON($data);
    }

    public function readNilai()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nilai = $this->request->getPost('nilai');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $waktu_pengerjaan = date('Y-m-d H:i:s');

        $data = [
            'nilai' => $nilai,
            'nama_siswa' => $nama_siswa,
            'waktu_pengerjaan' => $waktu_pengerjaan
        ];

        try {
            // insert ke table siswa
            $this->siswaModel->insert($data);

            // get ID Insert
            $id = $this->siswaModel->getInsertID();

            $returnData =
                [
                    'success' => true,
                    'id_siswa' => $id,
                    'message' => 'Data berhasil disimpan'
                ];

            // return json
            return $this->response->setJSON($returnData);
        } catch (\Exception $e) {
            $returnData =
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ];

            // return json
            return $this->response->setJSON($returnData);
        }
    }
    public function readNilaiPretest()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nilai = $this->request->getPost('nilai');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $waktu_pengerjaan = date('Y-m-d H:i:s');

        $data = [
            'nilai' => $nilai,
            'nama_siswa' => $nama_siswa,
            'waktu_pengerjaan' => $waktu_pengerjaan
        ];

        try {
            // insert ke table siswa
            $this->dataPreTestModel->insert($data);

            // get ID Insert
            $id = $this->dataPreTestModel->getInsertID();

            $returnData =
                [
                    'success' => true,
                    'id_siswa' => $id,
                    'message' => 'Data berhasil disimpan'
                ];

            // return json
            return $this->response->setJSON($returnData);
        } catch (\Exception $e) {
            $returnData =
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ];

            // return json
            return $this->response->setJSON($returnData);
        }
    }
    public function readNilaiPostTest()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nilai = $this->request->getPost('nilai');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $waktu_pengerjaan = date('Y-m-d H:i:s');

        $data = [
            'nilai' => $nilai,
            'nama_siswa' => $nama_siswa,
            'waktu_pengerjaan' => $waktu_pengerjaan
        ];

        try {
            // insert ke table siswa
            $this->dataPostTestModel->insert($data);

            // get ID Insert
            $id = $this->dataPostTestModel->getInsertID();

            $returnData =
                [
                    'success' => true,
                    'id_siswa' => $id,
                    'message' => 'Data berhasil disimpan'
                ];

            // return json
            return $this->response->setJSON($returnData);
        } catch (\Exception $e) {
            $returnData =
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ];

            // return json
            return $this->response->setJSON($returnData);
        }
    }

    public function skor()
    {
        $data = $this->siswaModel->findAll();

        // return json
        return $this->response->setJSON($data);
    }

    public function pengaturan()
    {
        $data = $this->pengaturanModel->where('id', 1)->first();

        $jumlah_soal = $data['jumlah_soal'];
        $datas = [
            'jumlah_soal' => $jumlah_soal
        ];

        // return json
        return $this->response->setJSON($datas);
    }

    public function getNilai()
    {

        // cari niliai pengisian terbaru
        $data = $this->siswaModel->findAll();

        // return json
        if ($data) {
            return $this->response->setJSON($data);
        }
    }
    public function getNilaiPreTest()
    {

        // cari niliai pengisian terbaru
        $data = $this->dataPreTestModel->findAll();

        // return json
        if ($data) {
            return $this->response->setJSON($data);
        }
    }
    public function getNilaiPostTest()
    {

        // cari niliai pengisian terbaru
        $data = $this->dataPostTestModel->findAll();

        // return json
        if ($data) {
            return $this->response->setJSON($data);
        }
    }
}

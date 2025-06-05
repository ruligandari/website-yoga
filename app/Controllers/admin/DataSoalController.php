<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DataSoalController extends BaseController
{
    protected $soalModel;
    protected $pengaturanModel;

    public function __construct()
    {
        $this->soalModel = new \App\Models\SoalModel();
        $this->pengaturanModel = new \App\Models\PengaturanModel();
    }
    public function index()
    {
        $soal = $this->soalModel->findAll();
        $pengaturan = $this->pengaturanModel->find(1);
        $data = [
            'title' => 'Data Soal',
            'soal' => $soal,
            'pengaturan' => $pengaturan
        ];

        return view('admin/data-soal/data-soal', $data);
    }

    public function add()
    {
        $soal = $this->request->getPost('soal');
        $pilihan_a = $this->request->getPost('pilihan_a');
        $pilihan_b = $this->request->getPost('pilihan_b');
        $pilihan_c = $this->request->getPost('pilihan_c');
        $pilihan_d = $this->request->getPost('pilihan_d');
        $jawaban = $this->request->getPost('jawaban');
        $bobot_nilai = $this->request->getPost('bobot_nilai');

        // validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban' => 'required',
            'bobot_nilai' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $this->soalModel->save([
                'soal' => $soal,
                'pilihan_a' => $pilihan_a,
                'pilihan_b' => $pilihan_b,
                'pilihan_c' => $pilihan_c,
                'pilihan_d' => $pilihan_d,
                'jawaban' => $jawaban,
                'bobot_nilai' => $bobot_nilai
            ]);

            return redirect()->to(base_url('admin/data-soal'))->with('success', 'Data soal berhasil ditambahkan');
        } else {
            return redirect()->to(base_url('admin/data-soal'))->withInput()->with('error', 'Data soal gagal ditambahkan');
        }
    }

    public function delete($id)
    {
        // jika id ada hapus, jika tidak ada tampilkan error
        $soal = $this->soalModel->find($id);
        if ($soal) {
            $this->soalModel->delete($id);
            // return json
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data soal berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data soal tidak ditemukan'
            ]);
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $soal = $this->request->getPost('soal');
        $pilihan_a = $this->request->getPost('pilihan_a');
        $pilihan_b = $this->request->getPost('pilihan_b');
        $pilihan_c = $this->request->getPost('pilihan_c');
        $pilihan_d = $this->request->getPost('pilihan_d');
        $jawaban = $this->request->getPost('jawaban');
        $bobot_nilai = $this->request->getPost('bobot_nilai');

        // validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban' => 'required',
            'bobot_nilai' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = [
                'soal' => $soal,
                'pilihan_a' => $pilihan_a,
                'pilihan_b' => $pilihan_b,
                'pilihan_c' => $pilihan_c,
                'pilihan_d' => $pilihan_d,
                'jawaban' => $jawaban,
                'bobot_nilai' => $bobot_nilai
            ];

            $this->soalModel->update($id, $data);

            return redirect()->to(base_url('admin/data-soal'))->with('success', 'Data soal berhasil diupdate');
        } else {
            return redirect()->to(base_url('admin/data-soal'))->withInput()->with('error', 'Data soal gagal diupdate');
        }
    }

    public function pengaturan()
    {
        $id = 1;
        $jumlah_soal = $this->request->getPost('jumlah_soal');

        // update jumlah soal
        $this->pengaturanModel->update($id, ['jumlah_soal' => $jumlah_soal]);

        return redirect()->to(base_url('admin/data-soal'))->with('success', 'Pengaturan jumlah soal berhasil diupdate');
    }
}

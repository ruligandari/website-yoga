<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DataSiswaController extends BaseController
{
    protected $siswaModel;
    protected $dataPreTestModel;
    public function __construct()
    {
        $this->siswaModel = new \App\Models\DataSiswaModel();
        $this->dataPreTestModel = new \App\Models\DataPreTest();
    }
    public function index()
    {
        $dataSiswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Data Siswa',
            'dataSiswa' => $dataSiswa
        ];

        return view('admin/data-siswa/data-siswa', $data);
    }

    public function export()
    {
        // export data ke excel dengan package phpoffice/phpspreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nilai');
        $sheet->setCellValue('D1', 'Waktu Pengerjaan');

        $dataSiswa = $this->dataPreTestModel->findAll();
        $no = 2;
        foreach ($dataSiswa as $data) {
            $sheet->setCellValue('A' . $no, $no - 1);
            $sheet->setCellValue('B' . $no, $data['nama_siswa']);
            $sheet->setCellValue('C' . $no, $data['nilai']);
            $sheet->setCellValue('D' . $no, $data['waktu_pengerjaan']);
            $no++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        $filename = 'Data Siswa ' . date('Y-m-d H:i:s');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        exit();

        return redirect()->to('/admin/data-siswa');
    }

    public function deleteDataSiswa()
    {
        $id = $this->request->getPost('id');
        if ($this->dataPreTestModel->where('id', $id)->delete()) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data siswa berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data siswa gagal dihapus'
            ]);
        }
    }
}

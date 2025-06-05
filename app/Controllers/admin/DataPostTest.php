<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DataPostTest extends BaseController
{
    protected $dataPostTestModel;
    // cunstruct method to initialize any required services or models
    public function __construct()
    {
        $this->dataPostTestModel = model('App\Models\DataPostest');
    }
    public function index()
    {
        // find all data from the model
        $dataPostTest = $this->dataPostTestModel->findAll();
        // prepare data for the view
        $data = [
            'title' => 'Data Post Test',
            'dataSiswa' => $dataPostTest
        ];
        // return the view with the data
        return view('admin/data-post-test/data-post-test', $data);
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

        $dataSiswa = $this->dataPostTestModel->findAll();
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

        return redirect()->to('/admin/data-post-test');
    }

    public function deleteDataSiswa()
    {
        $id = $this->request->getPost('id');
        if ($this->dataPostTestModel->where('id', $id)->delete()) {
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

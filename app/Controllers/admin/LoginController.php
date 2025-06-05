<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('admin/login/login', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $admin = $this->adminModel->where('username', $username)->first();

        if ($admin) {
            if ($password == $admin['password']) {
                session()->set([
                    'role' => $admin['role'],
                    'id' => $admin['id'],
                    'username' => $admin['username'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/admin/data-soal');
            } else {
                return redirect()->to('/')->with('error', 'Password salah');
            }
        } else {
            return redirect()->to('/')->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

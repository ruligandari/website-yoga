<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'admin\LoginController::index');
$routes->post('login', 'admin\LoginController::auth');
$routes->get('logout', 'admin\LoginController::logout');

// routes grup admin

$routes->group(
    'admin',
    ['namespace' => 'App\Controllers\admin', 'filter' => 'authAdmin'],
    function ($routes) {
        $routes->get('data-soal', 'DataSoalController::index');
        $routes->post('data-soal/add', 'DataSoalController::add');
        $routes->post('data-soal/update', 'DataSoalController::update');
        $routes->delete('data-soal/delete/(:num)', 'DataSoalController::delete/$1');
        $routes->post('data-soal/update-pengaturan', 'DataSoalController::pengaturan');
        // post test
        $routes->get('data-post-test', 'DataPostTest::index');
        $routes->get('data-post-test/export', 'DataPostTest::export');
        $routes->post('data-post-test/hapus', 'DataPostTest::deleteDataSiswa');
        // pre test
        $routes->get('data-siswa', 'DataSiswaController::index');
        $routes->post('data-siswa/hapus', 'DataSiswaController::deleteDataSiswa');
        $routes->get('data-siswa/export', 'DataSiswaController::export');
    }
);

$routes->group('api', function ($routes) {
    $routes->get('readsoal', 'api\ApiController::index');

    $routes->get('read-pre-test', 'api\ApiController::readPreTest');
    $routes->get('read-post-test', 'api\ApiController::readPostTest');

    $routes->get('readsoal-by-id/(:num)', 'api\ApiController::readSoalById/$1');
    $routes->get('readsoal-by-id', 'api\ApiController::readSoal');
    $routes->post('readsoal-by-id/(:num)', 'api\ApiController::readSoalPostId/$1');
    $routes->post('readsoal-by-id', 'api\ApiController::readSoalPost');

    $routes->post('readnilai-pre-test', 'api\ApiController::readNilaiPreTest');
    $routes->post('readnilai-post-test', 'api\ApiController::readNilaiPostTest');

    $routes->get('skor', 'api\ApiController::skor');
    $routes->get('readpengaturan', 'api\ApiController::pengaturan');
    $routes->get('get-nilai-pre-test', 'api\ApiController::getNilaiPreTest');
    $routes->get('get-nilai-post-test', 'api\ApiController::getNilaiPostTest');
});

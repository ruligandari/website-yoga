<?= $this->extend('admin/template'); ?>
<?= $this->section('style'); ?>
<link href="<?= base_url('assets') ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <!-- button modal tambah data soal -->
                    <h4>Data Soal</h4>

                </div>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <!-- <form class="form-inline" action="<? base_url('admin/data-soal/update-pengaturan') ?>" method="post">
                    <? //csrf_field(); 
                    ?>
                    <div class="form-group mb-2">
                        <label class="sr-only">Email</label>
                        <input type="text" readonly class="form-control-plaintext" value="Jumlah Soal Tampil">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="sr-only">Jumlah Soal</label>
                        <input type="number" class="form-control" value="<?= $pengaturan['jumlah_soal'] ?>" name="jumlah_soal">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form> -->
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Soal</a>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Soal</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Soal</th>
                                    <th>Soal</th>
                                    <th>Pilihan A</th>
                                    <th>Pilihan B</th>
                                    <th>Pilihan C</th>
                                    <th>Pilihan D</th>
                                    <th>Jawaban</th>
                                    <th> Bobot Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($soal as $data): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['jenis_soal'] ?></td>
                                        <td><?= $data['soal'] ?></td>
                                        <td><?= $data['pilihan_a'] ?></td>
                                        <td><?= $data['pilihan_b'] ?></td>
                                        <td><?= $data['pilihan_c'] ?></td>
                                        <td><?= $data['pilihan_d'] ?></td>
                                        <td><?= $data['jawaban'] ?></td>
                                        <td><?= $data['bobot_nilai'] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $data['id'] ?>"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" onclick="deleteSoal(<?= $data['id'] ?>)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Soal</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/data-soal/add') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <textarea class="form-control" id="soal" rows="3" name="soal" placeholder="Masukan Soal..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jawaban">Jenis Soal</label>
                            <select class="form-control" id="jawaban" name="jawaban">
                                <option value="">===Pilih===</option>
                                <option value="Pre-Test">Pre-Test</option>
                                <option value="Post-Test">Post-Test</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pilihan_a">Pilihan A</label>
                            <input type="text" class="form-control" id="pilihan_a" name="pilihan_a" placeholder="Masukan Pilihan A...">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_b">Pilihan B</label>
                            <input type="text" class="form-control" id="pilihan_b" name="pilihan_b" placeholder="Masukan Pilihan B...">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_c">Pilihan C</label>
                            <input type="text" class="form-control" id="pilihan_c" name="pilihan_c" placeholder="Masukan Pilihan C...">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_d">Pilihan D</label>
                            <input type="text" class="form-control" id="pilihan_d" name="pilihan_d" placeholder="Masukan Pilihan D...">
                        </div>
                        <div class="form-group">
                            <label for="jawaban">Jawaban</label>
                            <select class="form-control" id="jawaban" name="jawaban">
                                <option value="">Pilih Jawaban...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot_nilai">Bobot Nilai</label>
                            <input type="number" class="form-control" id="bobot_nilai" name="bobot_nilai" placeholder="Masukan Bobot Nilai...">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($soal as $s) : ?>
        <div class="modal fade bd-example-modal-lg" id="editModal<?= $s['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Soal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/data-soal/update') ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" value="<?= $s['id'] ?>" name="id">
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea class="form-control" id="soal" rows="3" name="soal" placeholder="Masukan Soal..."><?= $s['soal'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="bobot_nilai">Jenis Soal</label>
                                <select class="form-control" id="jawaban" name="jawaban">
                                    <option value="">Pilih Jawaban...</option>
                                    <option value="Pre-Test" <?= $s['jenis_soal'] == 'Pre-Test' ? 'selected' : '' ?>>Pre-Test</option>
                                    <option value="Post-Test" <?= $s['jenis_soal'] == 'Post-Test' ? 'selected' : '' ?>>Post-Test</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pilihan_a">Pilihan A</label>
                                <input type="text" class="form-control" id="pilihan_a" name="pilihan_a" value="<?= $s['pilihan_a'] ?>" placeholder="Masukan Pilihan A...">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_b">Pilihan B</label>
                                <input type="text" class="form-control" id="pilihan_b" name="pilihan_b" value="<?= $s['pilihan_b'] ?>" placeholder="Masukan Pilihan B...">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_c">Pilihan C</label>
                                <input type="text" class="form-control" id="pilihan_c" name="pilihan_c" value="<?= $s['pilihan_c'] ?>" placeholder="Masukan Pilihan C...">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_d">Pilihan D</label>
                                <input type="text" class="form-control" id="pilihan_d" name="pilihan_d" value="<?= $s['pilihan_d'] ?>" placeholder="Masukan Pilihan D...">
                            </div>
                            <div class="form-group">
                                <label for="jawaban">Jawaban</label>
                                <select class="form-control" id="jawaban" name="jawaban">
                                    <option value="">Pilih Jawaban...</option>
                                    <option value="A" <?= $s['jawaban'] == 'A' ? 'selected' : '' ?>>A</option>
                                    <option value="B" <?= $s['jawaban'] == 'B' ? 'selected' : '' ?>>B</option>
                                    <option value="C" <?= $s['jawaban'] == 'C' ? 'selected' : '' ?>>C</option>
                                    <option value="D" <?= $s['jawaban'] == 'D' ? 'selected' : '' ?>>D</option>
                                </select>
                            </div>
                            <!-- update bobot nilai -->
                            <div class="form-group">
                                <label for="bobot_nilai">Bobot Nilai</label>
                                <input type="number" class="form-control" id="bobot_nilai" name="bobot_nilai" value="<?= $s['bobot_nilai'] ?>" placeholder="Masukan Bobot Nilai...">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- Datatable -->
<script src="<?= base_url('assets') ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/js/plugins-init/datatables.init.js"></script>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
        })
    </script>
<?php elseif (session()->getFlashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= session()->getFlashdata('error') ?>',
        })
    </script>
<?php endif; ?>

<script>
    function deleteSoal(id) {
        console.log(id);
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value == true) {
                console.log('delete');
                // fetch api
                fetch(`<?= base_url('admin/data-soal/delete') ?>/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Terhapus!',
                                'Data soal berhasil dihapus.',
                                'success'
                            ).then(() => {
                                window.location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data soal gagal dihapus.',
                                'error'
                            ).then(() => {
                                window.location.reload();
                            })
                        }
                    });
            }
        })
    }
</script>
<?= $this->endSection(); ?>
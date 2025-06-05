<?= $this->extend('admin/template'); ?>
<?= $this->section('style'); ?>
<link href="<?= base_url('assets') ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Post-Test Siswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <a href="<?= base_url('admin/data-siswa/export') ?>" class="btn btn-primary">Export Data</a>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Waktu Pengerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataSiswa as $data): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama_siswa'] ?></td>
                                        <td><?= $data['nilai'] ?></td>
                                        <td><?= $data['waktu_pengerjaan'] ?></td>
                                        <td><button class="btn btn-danger" onclick="hapusData(<?= $data['id'] ?>)"><i class="fa fa-trash"></button></td>
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
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- Datatable -->
<script src="<?= base_url('assets') ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/js/plugins-init/datatables.init.js"></script>

<script>
    function hapusData(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/data-post-test/hapus') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    }
                });
            }
        })
    }
</script>
<?= $this->endSection(); ?>
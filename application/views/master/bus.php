<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master - BUS</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data BUS Terdaftar</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Kendaraan</th>
                            <th>Nama PO</th>
                            <th>Jenis Angkutan</th>
                            <th>Trayek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $datar) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $datar->nomor_plat_kendaraan ?></td>
                                <td><?= $datar->nama_po ?></td>
                                <td><?= $datar->jenis_angkutan ?></td>
                                <td><?= $datar->trayek ?></td>
                                <td class="text-center">
                                    <button href="#" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nomor Plat Kendaraan</label>
                            <input type="text" class="form-control" name="nomor_plat_kendaraan" placeholder="Misal:E1234YAH">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama PO</label>
                            <input type="text" class="form-control" name="nama_po" placeholder="Misal:Sehati">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Jenis Angkutan</label>
                            <select name="jenis_angkutan" class="form-control">
                                <option value="">--Pilih Jenis Angkutan--</option>
                                <option value="AKAP">AKAP</option>
                                <option value="AKDP">AKDP</option>
                                <option value="PARIWISATA">PARIWISATA</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
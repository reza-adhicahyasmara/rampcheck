<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Bus <i class="fa fa-bus"></i></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nomor Plat Kendaraan</td>
                                            <td><?= $bus->nomor_plat_kendaraan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama PO</td>
                                            <td><?= $bus->nama_po ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Angkutan</td>
                                            <td><?= $bus->jenis_angkutan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Trayek</td>
                                            <td><?= $bus->trayek ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rampcheck Yang telah di lakukan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor</th>
                                    <th>BUS</th>
                                    <th>Sopir</th>
                                    <th>Penguji</th>
                                    <th>Status</th>
                                    <th>Waktu Pemeriksaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $datar) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td class="font-weight-bold text-center"><a href="<?= base_url('rampcheck/detail/' . $datar->id_rampcheck) ?>">#<?= $datar->id_rampcheck ?></a></td>
                                        <td><?= limitText($datar->nomor_plat_kendaraan . ' ' . $datar->nama_po . ' ' . $datar->jenis_angkutan . ' ' . $datar->trayek) ?></td>
                                        <td><?= $datar->nama_sopir ?></td>
                                        <td><?= $datar->nama_penguji ?></td>
                                        <td><?= convertStatusRampcheck($datar->status) ?></td>
                                        <td><?= $datar->tanggal_pemeriksaan ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
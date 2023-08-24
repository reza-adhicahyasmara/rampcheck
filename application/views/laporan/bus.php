<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan - Bus <i class="fa fa-bus"></i></h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('cetak/printout_bus') ?>" target="_blank" method="POST">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>BUS</label>
                                        <select class="form-control" name="id_bus">
                                            <option value="">--Pilih Bus--</option>
                                            <?php foreach ($bus as $s) : ?>
                                                <option value="<?= $s->id_bus ?>"><?= $s->nomor_plat_kendaraan . ' ' . $s->nama_po . ' ' . $s->jenis_angkutan . ' ' . $s->trayek ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <center> <button type="submit" class="btn btn-primary">Cetak <i class="fa fa-print"></i></button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer') ?>
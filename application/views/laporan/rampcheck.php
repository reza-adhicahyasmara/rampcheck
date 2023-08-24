<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan - Rampcheck <i class="fa fa-check-circle"></i></h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('cetak/printout_rampcheck') ?>" target="_blank" method="POST">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name="dari">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hingga Tanggal</label>
                                        <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name="hingga">
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
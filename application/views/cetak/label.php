<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cetak - Label <i class="fa fa-print"></i></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form target="_blank" action="<?= base_url('cetak/printout_label') ?>" method="POST">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center"><input style="cursor: pointer;" type="checkbox" id="checkall"></th>
                                <th>Nomor Kendaraan</th>
                                <th>Nama PO</th>
                                <th>Jenis Angkutan</th>
                                <th>Trayek</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $datar) : ?>
                                <tr>
                                    <td class="text-center"><input style="cursor: pointer;" type="checkbox" value="<?= $datar->id_bus ?>" name="item[]"></td>
                                    <td class="font-weight-bold text-center"><a href="<?= base_url('master/detail_bus/' . $datar->id_bus) ?>"><?= $datar->nomor_plat_kendaraan ?></a></td>
                                    <td><?= $datar->nama_po ?></td>
                                    <td><?= $datar->jenis_angkutan ?></td>
                                    <td><?= $datar->trayek ?></td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <div class="text-center">
                        <button type="submit" value="submit" class="btn btn-md btn-primary">Cetak <i class="fa fa-print"></i></button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer') ?>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "scrollY": "400px",
            "scrollCollapse": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
    $("#checkall").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
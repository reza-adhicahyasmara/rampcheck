<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master - Struktural <i class="fa fa-key"></i></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Struktural Jabatan</h6>
            </div>
        </div>
        <div class="card-body">
           <form id="form">
           <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Nama Penyidik</label>
                    <input type="text" class="form-control" name="nama_penyidik" value="<?=@$data->nama_penyidik?>" placeholder="Nama Penyidik">
                </div>
                </div>
                <div class="col-md-12">

                <div class="form-group">
                    <label>NIP Penyidik</label>
                    <input type="text" class="form-control" name="nip_penyidik" value="<?=@$data->nip_penyidik?>" placeholder="Nip Penyidik">
                </div>
                </div>
            </div>
           </form>
        </div>
        <center><button id="btn-add" onclick="simpan();" class="btn btn-primary">Simpan Perubahan <i class="fa fa-save"></i></button></center>
        <br>
    </div>
</div>

<?php $this->load->view('partials/footer') ?>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function Addvalidation() {
        if ($("#nama_penyidik").val() == "") {
            alertMessage("Nama Penyidik tidak boleh kosong");
            return false;
        }
        if ($('#nip_penyidik').val() == "") {
            alertMessage("NIP Penyidik tidak boleh kosong");
            return false;
        }
       
        return true;
    }


    function simpan() {
        if (!Addvalidation()) {
            return false;
        }
        $.ajax({
            url: "<?= base_url('master/edit_struktural') ?>",
            type: "POST",
            data: $('#form').serialize(),
            beforeSend() {
                $("#btn-add").attr("disabled", true);
                loading();
            },
            success: function(response) {
                $("#btn-add").attr("disabled", false);
                success();
            },
            error: function(response) {
                $("#btn-add").attr("disabled", false);
                Swal.fire({
                    icon: "error",
                    title: 'Opps!',
                    button: "Oke",
                    text: response.responseJSON.messages
                }).then(function() {})
            }
        });
    }
</script>
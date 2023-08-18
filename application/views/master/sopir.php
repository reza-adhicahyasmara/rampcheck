<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master - Sopir <i class="fa fa-users"></i></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Sopir Terdaftar</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $datar) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td class="font-weight-bold text-center"><a href="<?= base_url('master/detail_sopir/' . $datar->id_sopir) ?>"><?= $datar->nama_sopir ?></a></td>
                                <td><?= $datar->tgl_lahir ?></td>
                                <td><?= calculateAge($datar->tgl_lahir) ?></td>
                                <td><?= $datar->telepon ?></td>
                                <td><?= $datar->alamat ?></td>
                                <td class="text-center">
                                    <button onclick="fillEdit('<?= $datar->id_sopir ?>','<?= $datar->nama_sopir ?>','<?= $datar->tgl_lahir ?>','<?= $datar->telepon ?>','<?= $datar->alamat ?>')" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="hapus('<?= $datar->id_sopir ?>')" class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sopir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" maxlength="30" id="add_nama_sopir" onkeydown="return [a-z]/i.test(event.key)" class="form-control" style="text-transform:uppercase" name="nama_sopir" placeholder="Misal:Budi">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" id="add_tgl_lahir" name="tgl_lahir" placeholder="01-01-1961">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" maxlength="14" id="add_telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="telepon" placeholder="Misal:08123456789">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="add_alamat" name="alamat" placeholder="Misal:Jl.Kenari No.22">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" id="btn-add" onclick="simpan()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Bus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="hidden" name="id_sopir" id="id_sopir">
                                <input type="text" maxlength="30" onkeydown="return [a-z]/i.test(event.key)" class="form-control" style="text-transform:uppercase" id="nama_sopir" name="nama_sopir" placeholder="Misal:Budi">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="01-01-1961">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" maxlength="14" id="telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="telepon" placeholder="Misal:08123456789">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Misal:Jl.Kenari No.22">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" id="btn-edit" onclick="edit()" class="btn btn-primary">Simpan Perubahan</button>
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

    function Addvalidation() {
        if ($("#add_nama_sopir").val() == "") {
            alertMessage("Nama Sopir tidak boleh kosong");
            return false;
        }
        if ($('#add_tgl_lahir').val() == "") {
            alertMessage("Tanggal tidak boleh kosong");
            return false;
        }
        if ($('#add_telepon').find(":selected").val() == "") {
            alertMessage("Telepon tidak boleh kosong");
            return false;
        }
        if ($('#add_alamat').val() == "") {
            alertMessage("Alamat Tidak boleh kosong");
            return false;
        }
        return true;
    }

    function editValidation() {
        if ($("#nama_sopir").val() == "") {
            alertMessage("Nama Sopir tidak boleh kosong");
            return false;
        }
        if ($('#tgl_lahir').val() == "") {
            alertMessage("Tanggal tidak boleh kosong");
            return false;
        }
        if ($('#telepon').find(":selected").val() == "") {
            alertMessage("Telepon tidak boleh kosong");
            return false;
        }
        if ($('#alamat').val() == "") {
            alertMessage("Alamat Tidak boleh kosong");
            return false;
        }
        return true;
    }

    function simpan() {
        if (!Addvalidation()) {
            return false;
        }
        $.ajax({
            url: "<?= base_url('master/add_sopir') ?>",
            type: "POST",
            data: $('#form-add').serialize(),
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

    function edit() {
        if (!editValidation()) {
            return false;
        }
        $.ajax({
            url: "<?= base_url('master/edit_sopir') ?>",
            type: "POST",
            data: $('#form-edit').serialize(),
            beforeSend() {
                $("#btn-edit").attr("disabled", true);
                loading();
            },
            success: function(response) {
                $("#btn-edit").attr("disabled", false);
                success();
            },
            error: function(response) {
                $("#btn-edit").attr("disabled", false);
                Swal.fire({
                    icon: "error",
                    title: 'Opps!',
                    button: "Oke",
                    text: response.responseJSON.messages
                }).then(function() {})
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            icon: 'question',
            title: 'Hapus',
            text: 'Anda yakin akan menghapus SOPIR ini ?',
            showConfirmButton: true,
            showCancelButton: true,
            showBackdrop: true,
            confirmButtonText: 'Ya Hapus',
            cancelButtonText: 'Tidak'
        }).then(function(data) {
            if (data.value === true) {
                $.ajax({
                    url: "<?= base_url('master/delete_sopir') ?>",
                    type: "POST",
                    data: {
                        "id": id,
                    },
                    beforeSend() {
                        loading();
                    },
                    success: function(response) {
                        success();
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: "error",
                            title: 'Opps!',
                            button: "Oke",
                            text: response.responseJSON.messages
                        }).then(function() {})
                    }
                });
            }
        });
    };

    function fillEdit(id_sopir, nama_sopir, tgl_lahir, telepon, alamat) {
        $('#editModal').modal('show');
        $('#id_sopir').val(id_sopir);
        $('#nama_sopir').val(nama_sopir);
        $('#tgl_lahir').val(tgl_lahir);
        $('#telepon').val(telepon);
        $('#alamat').val(alamat);
    }
</script>
<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master - Pengguna <i class="fa fa-key"></i></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Terdaftar</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Lengkap</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $datar) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?=$datar->username?></td>
                                <td><?=$datar->password ?></td>
                                <td><?= $datar->nama ?></td>
                                <td><?= $datar->nip ?></td>
                                <td class="text-center"><?php
                                if($datar->role==1){
                                    echo '<span class="badge badge-primary">ADMIN</span>';
                                }
                                if($datar->role==2){
                                    echo '<span class="badge badge-success">CHECKER <i class="fa fa-mobile"></i></span> ';
                                }
                                if($datar->role==3){
                                    echo '<span class="badge badge-danger">Pimpinan</span>';
                                }
                                ?>
                            </td>
                                <td class="text-center">
                                    <button onclick="fillEdit('<?= $datar->id_user ?>','<?= $datar->username ?>','<?= $datar->password ?>','<?= $datar->nama ?>','<?= $datar->nip ?>','<?= $datar->role ?>')" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="hapus('<?= $datar->id_user ?>', '<?=$datar->role?>')" class="btn btn-danger btn-circle btn-sm">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" maxlength="30" id="add_username" onkeydown="return /^[a-zA-Z0-9]+$/.test(event.key)" class="form-control"  name="username" placeholder="Misal:Budi">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" id="add_password" name="password" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" maxlength="30"  onkeydown="return /[a-zA-Z0-9 ]/.test(event.key)" id="add_nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Misal:Riyan Yudistiar">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" id="add_nip" name="nip" placeholder="Misal:123.123.123">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ROLE</label>
                                <select name="role" id="add_role" class="form-control">
                                    <option value="">--Pilih Role--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Checker (Android)</option>
                                    <option value="3">Pimpinan</option>
                                </select>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-edit">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" id="id_user" name="id_user">
                                <input type="text" maxlength="30" id="username" onkeydown="return /^[a-zA-Z0-9]+$/.test(event.key)" class="form-control"  name="username" placeholder="Misal:Budi">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" maxlength="33" id="nama_lengkap"  onkeydown="return /[a-zA-Z0-9 ]/.test(event.key)" class="form-control" name="nama_lengkap" placeholder="Misal:Riyan Yudistiar">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Misal:123.123.123">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ROLE</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">Checker (Android)</option>
                                    <option value="3">Pimpinan</option>
                                </select>
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
        if ($("#add_username").val() == "") {
            alertMessage("Username tidak boleh kosong");
            return false;
        }
        if ($('#add_password').val() == "") {
            alertMessage("Password tidak boleh kosong");
            return false;
        }
        if ($('#add_nama_lengkap').val() == "") {
            alertMessage("Nama Lengkap tidak boleh kosong");
            return false;
        }
        if ($('#add_nip').val() == "") {
            alertMessage("NIP tidak boleh kosong");
            return false;
        }
        if ($('#add_role').find(":selected").val() == "") {
            alertMessage("Role Wajib di pilih");
            return false;
        }
        return true;
    }

    function editValidation() {
        if ($("#username").val() == "") {
            alertMessage("Username tidak boleh kosong");
            return false;
        }
        if ($('#password').val() == "") {
            alertMessage("Password tidak boleh kosong");
            return false;
        }
        if ($('#nama_lengkap').val() == "") {
            alertMessage("Nama Lengkap tidak boleh kosong");
            return false;
        }
        if ($('#nip').val() == "") {
            alertMessage("NIP tidak boleh kosong");
            return false;
        }
        if ($('#role').find(":selected").val() == "") {
            alertMessage("Role Wajib di pilih");
            return false;
        }
        return true;
    }

    function simpan() {
        if (!Addvalidation()) {
            return false;
        }
        $.ajax({
            url: "<?= base_url('master/add_pengguna') ?>",
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
            url: "<?= base_url('master/edit_pengguna') ?>",
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

    function hapus(id,role) {
        Swal.fire({
            icon: 'question',
            title: 'Hapus',
            text: 'Anda yakin akan menghapus Pengguna ini ?',
            showConfirmButton: true,
            showCancelButton: true,
            showBackdrop: true,
            confirmButtonText: 'Ya Hapus',
            cancelButtonText: 'Tidak'
        }).then(function(data) {
            if (data.value === true) {
                $.ajax({
                    url: "<?= base_url('master/delete_pengguna') ?>",
                    type: "POST",
                    data: {
                        "id": id,
                        "role":role,
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

    function fillEdit(id_user, username, password, nama_lengkap, nip, role) {
        $('#editModal').modal('show');
        $('#id_user').val(id_user);
        $('#username').val(username);
        $('#password').val(password);
        $('#nama_lengkap').val(nama_lengkap);
        $('#nip').val(nip);
        var roles="";
        if(role==1){
            roles="Admin";
        }
        if(role==2){
            roles="Checker (Android)</"
        }
        if(role==3){
            roles="Pimpinan";
        }
        var option = "<option value=" + role + " selected='true'>" + roles + "</option>"
        $('#role').append(option);
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Login</title>
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/sweetalert2/sweetalert2.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .image-bumper{
             background: url("<?=base_url('assets/img/terminal.jpg')?>");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block image-bumper">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Dinas Perhubungan Kuningan</h1>
                                        <img width="75px" style="margin-bottom: 25px;" src="<?=base_url('assets/img/logo-dinas.jpg')?>" alt="">
                                    </div>
                                    <form id="form_login" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" id="btn_login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('partials/script')?>
    <script>
        $('form').one('submit', function(e) {
            e.preventDefault();
            login();
    });
        function validation(){
            if($('#username').val()==""){
               alertMessage("Username tidak boleh kosong");
               return false;
            }
             if($('#password').val()==""){
               alertMessage("Password tidak boleh kosong");
               return false;
            }
            return true;
        }
        function login(){
            if(!validation()){
                return false;
            }
          $.ajax({
              url: "<?= base_url('auth/prosess_login')?>",
              type: "POST",
              data:$('#form_login').serialize(), 
              beforeSend(){
              $("#btn_login").attr("disabled", true);
              loading();
              },
              success:function(response){
                $("#btn_login").attr("disabled", false);
                Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        button: "OK",
                          }).then(function() {
                              window.location = "<?= base_url('dashboard/')?>";
                            });
              },
              error:function(response){
                $("#btn_login").attr("disabled", false);
                  Swal.fire({
                    icon: "error",
                    title: 'Opps!',
                    button:"Oke",
                    text: response.responseJSON.messages
                  }).then(function(){
                  })
              }
            });
      }
    </script>
</body>
</html>
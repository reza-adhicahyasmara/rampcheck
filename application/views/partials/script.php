 <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
    <script src="<?=base_url('assets/')?>vendor/sweetalert2/sweetalert2.js"></script>
    <script>
        var loadingeffect='<div style="text-align:center;"><i class="fas fa-2x fa-circle-notch fa-3x fa-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>';
    function loading(){
        Swal.fire({
                title: 'Sedang Proses',
                html: loadingeffect,
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                });
    }
     function success(){
        Swal.fire({
                title: "Berhasil",
                icon: "success",
                button: "OK",
                    }).then(function() {
                        location.reload();
                    });
              }

    function logout(){
        Swal.fire({
                    icon: 'question',
                    title: 'PERHATIAN!',
                    text: 'Apakah anda ingin Keluar/Log Out sekarang?',
                    showConfirmButton: true,
                    showCancelButton: true,
                    showBackdrop: true,
                    confirmButtonText: 'Ya Keluar',
                    cancelButtonText: 'Tidak'
                }).then(function(data){
                    if(data.value === true){
                        window.location.href = "<?= base_url('auth/logout')?>";
                    }
                });
    };
     function alertMessage(message){
      Swal.fire({
                    icon: "warning",
                    title: message,
                    button:"Mengerti",
                    text: "Pastikan semua form terisi."
                  })
      }
</script>
<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/leftbar.php') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="card shadow col-md-12 col-md-6 mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Vigenere Cipher <i class="fa fa-qrcode"></i></h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample" style="">
                <div class="card-body">
                    Vigenere Cipher adalah sebuah metode enkripsi klasik yang digunakan untuk mengamankan teks dengan menggunakan kunci yang lebih panjang daripada pesan yang akan dienkripsi. Berikut adalah penjelasan singkat tentang cara Vigenere Cipher bekerja:

                    Kunci: Anda memerlukan sebuah kunci yang terdiri dari sebuah kata atau frasa. Kunci ini akan digunakan untuk mengenkripsi dan mendekripsi pesan.

                    Konversi Huruf ke Angka: Setiap huruf dalam pesan yang akan dienkripsi dikonversi menjadi angka berdasarkan urutan alfabet, misalnya A=0, B=1, C=2, dan seterusnya.

                    Proses Enkripsi: Untuk mengenkripsi pesan, setiap karakter dalam pesan dijumlahkan dengan karakter yang sesuai dalam kunci. Jika pesan lebih panjang dari kunci, kunci akan diulang-ulang hingga mencapai panjang pesan.

                    Proses Dekripsi: Untuk mendekripsi pesan yang telah dienkripsi, Anda mengurangkan karakter kunci dari karakter dalam pesan yang dienkripsi. <br>

                    <br>
                    Penggunaan dalam aplikasi ini terdapat pada pembuatan data BUS dengan mengenkripsi Nomor Plat Kendaraan untuk di gunakan sebagai primary key, dapat di lihat pada menu <a href="<?= base_url('master/bus') ?>">Master BUS</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total BUS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getTotalBus(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sopir</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getTotalSopir(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Rampcheck</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getTotalRampcheck(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Checker Android</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getTotalCheckerAndroid(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mobile fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Checker Harian</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pengecekan</h6>

                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>

                </div>
                <div class="card-body">
                    <small class="text-muted">Keseluruhan</small>
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Laik Jalan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Peringatan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Dilarang Operasional
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Tilang & Dilarang Operasional
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$label = '';
$data = '';
foreach ($line as $l) {
    $label .= '"' . $l->tanggal . '",';
    $data .= $l->jumlah_data . ',';
}
?>
<?php $this->load->view('partials/footer') ?>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Laik Jalan", "Peringatan", "Dilarang Operasional", "Tilang & Dilarang Operasional"],
            datasets: [{
                data: [<?= $donat->satu ?>, <?= $donat->dua ?>, <?= $donat->tiga ?>, <?= $donat->empat ?>],
                backgroundColor: ['#1CC88A', '#36B9CC', '#F6C23E', '#E74A3B'],
                hoverBackgroundColor: ['#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?= @$label ?>],
            datasets: [{
                label: "Rampcheck :",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [<?= @$data ?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>
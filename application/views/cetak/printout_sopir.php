<html lang="en" class="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Bookman Old Style", serif;
        }

        p {
            font-size: 9.5pt;
        }

        .item {
            margin-bottom: -15px;
            margin-left: 50px;
        }

        .justify {
            text-align: justify;
        }

        .right {
            text-align: right;
        }

        .footer {
            color: darkgray;
            font-size: 7pt;
        }

        .border {
            border: 1px solid black;
            border-radius: 10px;
        }
    </style>
    <title>Laporan barang</title>
</head>

<body>
    <table style="width: 100%;">
        <thead>
            <tr>
                <td style="width: 33%;"><img style="width:100px;" src="<?= base_url('assets/img/logo-dinas.jpg') ?>" alt=""></td>
                <td style="width: 33%;">
                    <center>
                        <h3>Laporan Sopir</h3>
                    </center>
                </td>
                <td style="width: 33%;">
                    <p class="right">Tanggal Cetak: <?= date('Y-m-d') ?></p>
                </td>
            </tr>
        </thead>
    </table>
    <hr>
    <center>
        <table style="width: 50%; border: 1px solid black; border-collapse: collapse; margin-top:30px;">
            <tbody>
                <tr>
                    <td class="border">Nama Sopir</td>
                    <td class="border"><b><?= $sopir->nama_sopir ?></b></td>
                </tr>
                <tr>
                    <td class="border">Tanggal Lahir</td>
                    <td class="border"><b><?= $sopir->tgl_lahir ?></b></td>
                </tr>
                <tr>
                    <td class="border">Telepon</td>
                    <td class="border"><b><?= $sopir->telepon ?></b></td>
                </tr>
                <tr>
                    <td class="border">alamat</td>
                    <td class="border"><b><?= $sopir->alamat ?></b></td>
                </tr>
            </tbody>
        </table>
    </center>
    <table style="width: 100%; border: 1px solid black; border-collapse: collapse; margin-top:30px;">
        <thead>
            <tr>
                <td class="border">
                    <center><b>No.</b></center>
                </td>
                <td class="border">
                    <center><b>Nomor Check</b></center>
                </td>
                <td class="border">
                    <center><b>Nomor Plat</b></center>
                </td>
                <td class="border">
                    <center><b>Nama PO</b></center>
                </td>
                <td class="border">
                    <center><b>Jenis Angkutan</b></center>
                </td>
                <td class="border">
                    <center><b>TRAYEK</b></center>
                </td>
                <td class="border">
                    <center><b>Sopir</b></center>
                </td>
                <td class="border">
                    <center><b>Penguji</b></center>
                </td>
                <td class="border">
                    <center><b>Status</b></center>
                </td>
                <td class="border">
                    <center><b>Waktu Pemeriksaan</b></center>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data as $rampcheck) :

            ?>
                <tr>
                    <td class="border"><?= $no ?></td>
                    <td class="border"><?= $rampcheck->id_rampcheck ?></td>
                    <td class="border"><?= $rampcheck->nomor_plat_kendaraan ?></td>
                    <td class="border"><?= $rampcheck->nama_po ?></td>
                    <td class="border"><?= $rampcheck->jenis_angkutan ?></td>
                    <td class="border"><?= $rampcheck->trayek ?></td>
                    <td class="border"><?= $rampcheck->nama_sopir ?></td>
                    <td class="border"><?= $rampcheck->nama_penguji ?></td>
                    <td class="border"><?= convertStatusRampchecktoText($rampcheck->status) ?></td>
                    <td class="border"><?= $rampcheck->tanggal_pemeriksaan ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>

</body>

</html>
<script type="text/javascript">
    window.print();
</script>
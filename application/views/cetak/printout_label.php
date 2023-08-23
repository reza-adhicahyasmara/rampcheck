<html lang="en" class="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-bottom: 5px;

        }
    </style>
    <title>Cetak Label</title>
</head>

<body>

    <?php foreach ($data as $datar) :
        $detail_bus = getDetailBus($datar); ?>
        <table>
            <tbody>
                <tr>
                    <td colspan="3">
                        <center>RAMPCHECK</center>
                    </td>
                </tr>
                <tr>
                    <td><img style="width:100px;" src="<?= base_url('assets/img/logo-dinas.jpg') ?>" alt=""></td>
                    <td>
                        <center>
                            <h3><?= $detail_bus->nama_po ?></h3>
                            <h3 style="margin-bottom:0;"><?= $detail_bus->jenis_angkutan ?></h3>
                            <p style="font-size: 6pt;"><?= $detail_bus->trayek ?></p>
                        </center>
                    </td>
                    <td>
                        <center>
                            <img style="width:100px;" src="<?= base_url(QR_LOAD_PATH) . $detail_bus->id_bus . '.png' ?>" alt="">
                        </center>
                    </td>
                </tr>
        </table>
    <?php endforeach;
    ?>
</body>

</html>
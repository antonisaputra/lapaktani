<html>

<head>
    <link rel="icon" sizes="32x32" href="<?= base_url(); ?>assets/img/lapaktani.png">
    <title>
        <?= $title ?>
    </title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #0AC489;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }

        .items td.cost {
            text-align: "."center;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <h2> <span style="color: #0AC489;"> Lapak Tani </span>: Daftar Produk Penjualan</h2>
    <div>Date: <?= date('d M Y  H:i:s'); ?></div>
    <br>
    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td width="5%">No.</td>
                <td width="15%">Nama Produk</td>
                <td width="15%">Kategori</td>
                <td width="15%">Nama Penjual</td>
                <td width="25%">Alamat Penjual</td>
                <td width="15%">Stok</td>
                <td width="15%">Berat Satuan</td>
                <td width="15%">Harga Satuan</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <?php $no = 1;
            foreach ($penjualan as $row) : ?>
                <tr>
                    <td align="center"><?= $no; ?></td>
                    <td align="center"><?= $row['nama_produk']; ?></td>
                    <td align="center"><?= $row['kategori']; ?></td>
                    <td align="center"><?= $row['nama_penjual']; ?></td>
                    <td align="center"><?= $row['alamat_penjual']; ?></td>
                    <td align="center"><?= $row['stok']; ?> Kg</td>
                    <td align="center"><?= $row['berat_satuan']; ?> Kg</td>
                    <td align="center"><?= 'Rp.' . number_format($row['harga_satuan'], 2, ",", "."); ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</body>

</html>
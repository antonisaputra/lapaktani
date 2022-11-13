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
    <h2> <span style="color: #0AC489;"> Lapak Tani </span>: Laporan Penjualan</h2>
    <div>Date: <?= date('d F Y h:i:s A'); ?></div>
    <br>
    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td class="border-gray-200">No</td>
                <td class="border-gray-200">Nama Produk</td>
                <td class="border-gray-200">Jumlah</td>
                <td class="border-gray-200">Harga</td>
                <td class="border-gray-200">Subtotal</td>
                <td class="border-gray-200">Metode Pembayaran</td>
                <td class="border-gray-200">No_Rekening</td>
                <td class="border-gray-200">Kurir</td>
                <td class="border-gray-200">Nama Pembeli</td>
                <td class="border-gray-200">Alamat Pembeli</td>
                <td class="border-gray-200">Nama Penjual</td>
                <td class="border-gray-200">Alamat Penjual</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <?php $no = 1; ?> 
                    <?php foreach ($transaksi as $row) : ?>
                        <?php if($row['status_barang'] == 'Barang Sampai'): ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['nama_produk']; ?></span>
                            </td>
                            <td><span class="fw-normal"><?= $row['jumlah']; ?></span></td>
                            <td><span class="fw-bold"><?= 'Rp.' . number_format($row['harga'], 2, ",", "."); ?></span></td>
                            <td><span class="fw-bold"><?= 'Rp.' . number_format($row['subtotal'], 2, ",", "."); ?></span></td>
                            <td>
                                <span class="fw-normal"><?= $row['metode_pembayaran']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['no_rek']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['kurir']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['username']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['alamat']; ?></span>
                            </td>
                            <?php $pembeli = $this->db->get_where('user', ['id' => $row['id_costumer']])->row_array(); ?>
                            <td>
                                <span class="fw-normal"><?= $pembeli['username']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $pembeli['alamat']; ?></span>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @media print{
            .btn-kembali{
                display: none;
            }
            .btn-print{
                display: none;
            }
        }
    </style>
</head>

<body>
<script>
        window.print();
    </script>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Alamat Pemesan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Berat Satuan</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pesanan as $row) : ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $row['nama_produk'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['nama_pemesan'] ?></td>
                        <td><?= $row['alamat_pemesan'] ?></td>
                        <td><?= $row['stok'] ?> Kg</td>
                        <td><?= $row['berat_satuan'] ?> Kg</td>
                        <td><?= 'Rp.' . number_format($row['harga_satuan'], 2, ",", "."); ?></td>
                        <td><img src="<?= base_url(); ?>assets/upload/<?= $row['gambar']; ?>" width="20" alt=""></td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url(); ?>Admin_pesanan" class="btn btn-danger btn-kembali">Kembali</a>
        <a href="<?= base_url(); ?>Admin_pesanan/print" class="btn btn-primary btn-print">Print</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
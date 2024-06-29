<?php
session_start();
$ID_Kasir = $_SESSION['ID_Kasir'];

include ('koneksi.php');

$ambilCustomer = mysqli_query($koneksi, "SELECT * FROM tabel_customer ORDER BY Id_Customer");
$ambilKasir = mysqli_query($koneksi, "SELECT * FROM tabel_kasir WHERE Id_Kasir = '$ID_Kasir'");
$ambilBarang = mysqli_query($koneksi, "SELECT * FROM tabel_barang ORDER BY Id_Barang");
$dataKasir = mysqli_fetch_assoc($ambilKasir);
?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Invoice</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=home">Rahyu Komputer</a></li>
            <li class="breadcrumb-item">Invoice</li>
            <li class="breadcrumb-item active" aria-current="page">Buat Invoice</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#pilihCustomer">
                        Pilih Customer
                    </a>
                </div>
                <div class="card-body">
                    <!-- INPUT CUSTOMER -->
                    <form method="POST" id="formCustomer">
                        <input type="hidden" class="form-control" id="ID_Customer" name="ID_Customer"
                            placeholder="Masukan ID Customer">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="Nama_Customer">Nama Customer</label>
                                <input type="text" class="form-control" id="Nama_Customer" name="Nama_Customer"
                                    placeholder="Masukan Nama Customer" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="Telepon_Customer">Telepon Customer</label>
                                <input type="text" class="form-control" id="Telepon_Customer" name="Telepon_Customer"
                                    placeholder="Masukan Telepon Customer" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="Alamat_Customer">Alamat Customer</label>
                                <input type="text" class="form-control" id="Alamat_Customer" name="Alamat_Customer"
                                    placeholder="Masukan Alamat Customer" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kasir</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" class="form-control" id="ID_Kasir" name="ID_Kasir"
                            value="<?= $ID_Kasir ?>">
                        <div class="form-group">
                            <label for="Nama_Kasir">Nama Kasir</label>
                            <input type="text" class="form-control" id="Nama_Kasir" name="Nama_Kasir"
                                value="<?= $dataKasir['Nama_Kasir'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nama_Kasir">Telepon Kasir</label>
                            <input type="text" class="form-control" id="Nama_Kasir" name="Nama_Kasir"
                                value="<?= $dataKasir['Telepon_Kasir'] ?>" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered tabel-hover">
        <thead>
            <tr>
                <th width="500">
                    <a href="#" class="btn btn-success btn-xs add-row">
                        <i class="fas fa-plus"></i> Product
                    </a>
                </th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-group row">
                        <div class="col-1">
                            <a href="#" class="btn btn-danger">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-7">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col-4">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#pilihBarang">
                                Pilih Produk
                            </a>
                        </div>
                    </div>
                </td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
            </tr>
        </tbody>
    </table>

    <!-- MODAL PILIH CUSTOMER -->
    <div class="modal fade" id="pilihCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($ambilCustomer)): ?>
                                <tr>
                                    <td><?= $data['Nama_Customer'] ?></td>
                                    <td><?= $data['Telepon_Customer'] ?></td>
                                    <td><?= $data['Alamat_Customer'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary pilihCustomer"
                                            data-id="<?= $data['Id_Customer'] ?>" data-nama="<?= $data['Nama_Customer'] ?>"
                                            data-telepon="<?= $data['Telepon_Customer'] ?>"
                                            data-alamat="<?= $data['Alamat_Customer'] ?>" data-dismiss="modal">
                                            Pilih
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PILIH BARANG -->
    <div class="modal fade" id="pilihBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($ambilBarang)): ?>
                                <tr>
                                    <td><?= $data['Nama_Barang'] ?></td>
                                    <td><?= $data['Harga'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary pilihCustomer"
                                            data-id="<?= $data['Id_Customer'] ?>" data-nama="<?= $data['Nama_Customer'] ?>"
                                            data-telepon="<?= $data['Telepon_Customer'] ?>"
                                            data-alamat="<?= $data['Alamat_Customer'] ?>" data-dismiss="modal">
                                            Pilih
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.pilihCustomer').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                var nama = this.getAttribute('data-nama');
                var telepon = this.getAttribute('data-telepon');
                var alamat = this.getAttribute('data-alamat');

                document.getElementById('ID_Customer').value = id;
                document.getElementById('Nama_Customer').value = nama;
                document.getElementById('Telepon_Customer').value = telepon;
                document.getElementById('Alamat_Customer').value = alamat;
            });
        });
    });
</script>
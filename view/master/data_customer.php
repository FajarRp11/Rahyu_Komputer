<?php
include ('models/proses_customer.php');

?>


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 pl-2">Data Customer</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=home">Rahyu Komputer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Customer</h6>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahCustomer">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Customer</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hasil = mysqli_query($koneksi, "SELECT * FROM tabel_customer ORDER BY Id_Customer ASC");
                        while ($data = mysqli_fetch_assoc($hasil)) {
                            $id = $data['Id_Customer'];
                            ?>
                        <tr>
                            <td><?= $data['Nama_Customer'] ?></td>
                            <td><?= $data['Telepon_Customer'] ?></td>
                            <td><?= $data['Alamat_Customer'] ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit<?= $id; ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete<?= $id; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- MODAL EDIT CUSTOMER -->
                        <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Customer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="ID_Customer"
                                                    name="ID_Customer" value="<?= $id; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Nama_Customer">Nama Customer</label>
                                                <input type="text" class="form-control" id="Nama_Customer"
                                                    name="Nama_Customer" value="<?= $data['Nama_Customer'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Telepon_Customer">Telepon Customer</label>
                                                <input type="text" class="form-control" id="Telepon_Customer"
                                                    name="Telepon_Customer" value="<?= $data['Telepon_Customer'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Alamat_Customer">Alamat Customer</label>
                                                <input type="text" class="form-control" id="Alamat_Customer"
                                                    name="Alamat_Customer" value="<?= $data['Alamat_Customer'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="editCustomer"
                                                    value="Simpan" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MODAL DELETE CUSTOMER -->
                        <div class="modal fade" id="delete<?= $id; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Customer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Form Hapus Customer-->
                                        <form method="POST">
                                            <div class="form-group">
                                                <p>Apakah anda yakin ingin menghapus
                                                    <?= $data['Nama_Customer']; ?>?
                                                    <input type="hidden" name="ID_Customer" class="form-control"
                                                        value="<?= $id; ?>">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="hapusCustomer"
                                                    value="Hapus">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL INPUT CUSTOMER -->
    <div class="modal fade" id="tambahCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="ID_Customer">ID Customer</label>
                            <input type="text" class="form-control" id="ID_Customer" name="ID_Customer"
                                placeholder="Masukan ID Customer">
                        </div>
                        <div class="form-group">
                            <label for="Nama_Customer">Nama Customer</label>
                            <input type="text" class="form-control" id="Nama_Customer" name="Nama_Customer"
                                placeholder="Masukan Nama Customer">
                        </div>
                        <div class="form-group">
                            <label for="Telepon_Customer">Telepon Customer</label>
                            <input type="text" class="form-control" id="Telepon_Customer" name="Telepon_Customer"
                                placeholder="Masukan Telepon Customer">
                        </div>
                        <div class="form-group">
                            <label for="Alamat_Customer">Alamat Customer</label>
                            <input type="text" class="form-control" id="Alamat_Customer" name="Alamat_Customer"
                                placeholder="Masukan Alamat Customer">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="tambahCustomer"
                                value="Tambah Customer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include ('./view/index/footer.php') ?>
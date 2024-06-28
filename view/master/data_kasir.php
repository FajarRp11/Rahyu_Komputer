<?php
include ('models/proses_kasir.php');

?>


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 pl-2">Data Kasir</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Rahyu Komputer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kasir</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kasir</h6>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahBarang">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Kasir</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hasil = mysqli_query($koneksi, "SELECT * FROM tabel_kasir ORDER BY Id_Kasir ASC");
                        while ($data = mysqli_fetch_assoc($hasil)) {
                            $id = $data['Id_Kasir'];
                            ?>
                            <tr>
                                <td>
                                    <?= $data['Nama_Kasir'] ?>
                                </td>
                                <td><?= $data['Telepon_Kasir'] ?></td>
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

                            <!-- MODAL EDIT KASIR -->
                            <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kasir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="ID_Kasir" name="ID_Kasir"
                                                        value="<?= $id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_Kasir">Nama Kasir</label>
                                                    <input type="text" class="form-control" id="Nama_Kasir"
                                                        name="Nama_Kasir" value="<?= $data['Nama_Kasir'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Telepon_Kasir">Telepon Kasir</label>
                                                    <input type="text" class="form-control" id="Telepon_Kasir"
                                                        name="Telepon_Kasir" value="<?= $data['Telepon_Kasir'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="editKasir"
                                                        value="Simpan" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DELETE KASIR -->
                            <div class="modal fade" id="delete<?= $id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data kasir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!--Form Hapus Kasir-->
                                            <form method="POST">
                                                <div class="form-group">
                                                    <p>Apakah anda yakin ingin menghapus
                                                        <?= $data['Nama_Kasir']; ?>?
                                                        <input type="hidden" name="ID_Kasir" class="form-control"
                                                            value="<?= $id; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="hapusKasir"
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

    <!-- MODAL INPUT KASIR -->
    <div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="ID_Kasir">ID Kasir</label>
                            <input type="text" class="form-control" id="ID_Kasir" name="ID_Kasir"
                                placeholder="Masukan ID Kasir">
                        </div>
                        <div class="form-group">
                            <label for="Nama_Kasir">Nama Kasir</label>
                            <input type="text" class="form-control" id="Nama_Kasir" name="Nama_Kasir"
                                placeholder="Masukan Nama Kasir">
                        </div>
                        <div class="form-group">
                            <label for="Telepon_Kasir">Telepon Kasir</label>
                            <input type="text" class="form-control" id="Telepon_Kasir" name="Telepon_Kasir"
                                placeholder="Masukan Telepon Kasir">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="tambahKasir" value="Tambah Kasir" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
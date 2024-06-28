<?php
include ('models/proses_barang.php');

function ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}
?>


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 pl-2">Data Barang</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Rahyu Komputer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahBarang">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Stock</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $hasil = mysqli_query($koneksi, "SELECT * FROM tabel_barang ORDER BY Id_Barang ASC");
                        while ($data = mysqli_fetch_assoc($hasil)) {
                            $id = $data['Id_Barang'];
                            ?>
                            <tr>
                                <td><?= $data['Nama_Barang'] ?></td>
                                <td>Rp. <?= ribuan($data['Harga']) ?></td>
                                <td><?= $data['Stock'] ?></td>
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

                            <!-- MODAL EDIT BARANG -->
                            <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="ID_Barang"
                                                        name="ID_Barang" value="<?= $id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_Barang">Nama Barang</label>
                                                    <input type="text" class="form-control" id="Nama_Barang"
                                                        name="Nama_Barang" value="<?= $data['Nama_Barang'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Harga_Barang">Harga Barang</label>
                                                    <input type="text" class="form-control" id="Harga_Barang"
                                                        name="Harga_Barang" value="<?= $data['Harga'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Stock_Barang">Stok Barang</label>
                                                    <input type="text" class="form-control" id="Stock_Barang"
                                                        name="Stock_Barang" value="<?= $data['Stock'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="editBarang"
                                                        value="Simpan" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DELETE BARANG -->
                            <div class="modal fade" id="delete<?= $id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!--Form Hapus Barang-->
                                            <form method="POST">
                                                <div class="form-group">
                                                    <p>Apakah anda yakin ingin menghapus
                                                        <?= $data['Nama_Barang']; ?>?
                                                        <input type="hidden" name="ID_Barang" class="form-control"
                                                            value="<?= $id; ?>">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="hapusBarang"
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

    <!-- MODAL INPUT BARANG -->
    <div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="ID_Barang">ID Barang</label>
                            <input type="text" class="form-control" id="ID_Barang" name="ID_Barang"
                                placeholder="Masukan ID Barang">
                        </div>
                        <div class="form-group">
                            <label for="Nama_Barang">Nama Barang</label>
                            <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang"
                                placeholder="Masukan Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="Harga_Barang">Harga Barang</label>
                            <input type="text" class="form-control" id="Harga_Barang" name="Harga_Barang"
                                placeholder="Masukan Harga Barang">
                        </div>
                        <div class="form-group">
                            <label for="Stock_Barang">Stok Barang</label>
                            <input type="text" class="form-control" id="Stock_Barang" name="Stock_Barang"
                                placeholder="Masukan Stok Barang">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="tambahBarang" value="Tambah Barang" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
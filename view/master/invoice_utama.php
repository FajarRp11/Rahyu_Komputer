<?php

include ('koneksi.php');
$id = $_GET['id'];

// MENAMPILKAN DATA INVOICE UTAMA
$queryTampilInvoice =
    "SELECT tht.*, tc.*, tk.* 
                            FROM 
                                tabel_header_transaksi tht
                            JOIN 
                                tabel_customer tc ON tht.Id_Customer = tc.Id_Customer 
                            JOIN
                                tabel_kasir tk ON tht.Id_Kasir = tk.Id_Kasir
                            ORDER BY tht.Id_Invoice ASC";
$hasilTampil = mysqli_query($koneksi, $queryTampilInvoice);

if (isset($_POST['hapusInvoice'])) {
    $Id_Invoice = $_POST['Id_Invoice'];

    // Mulai transaksi
    mysqli_begin_transaction($koneksi);

    try {
        // Hapus data dari tabel_detail_transaksi
        $queryDetail = "DELETE FROM `tabel_detail_transaksi` WHERE Id_Invoice = '$Id_Invoice'";
        mysqli_query($koneksi, $queryDetail);

        // Hapus data dari tabel_header_transaksi
        $queryHeader = "DELETE FROM `tabel_header_transaksi` WHERE Id_Invoice = '$Id_Invoice'";
        mysqli_query($koneksi, $queryHeader);

        // Commit transaksi
        mysqli_commit($koneksi);

        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Data Terhapus !</b></h6>
        </div>
        <?php
        header('location:index.php?page=barang');
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($koneksi);

        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
        </div>
        <?php
        header('location:index.php?page=barang');
    }
}

?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 pl-2">Data Invoice</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=home">Rahyu Komputer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Invoice</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Invoice</h6>
                <a href="index.php?page=buat-invoice" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>Nama Kasir</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($hasilTampil)) {
                            $id = $data['Id_Invoice'];
                            ?>
                            <tr>
                                <td><?= $data['Id_Invoice'] ?></td>
                                <td><?= $data['Tanggal'] ?></td>
                                <td><?= $data['Nama_Customer'] ?></td>
                                <td><?= $data['Nama_Kasir'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete<?= $id; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?page=view-detail&id=<?php echo $id ?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- MODAL DELETE INVOICE -->
                            <div class="modal fade" id="delete<?= $id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Invoice</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!--Form Hapus Customer-->
                                            <form method="POST">
                                                <div class="form-group">
                                                    <p>Apakah anda yakin ingin menghapus
                                                        <?= $data['Id_Invoice']; ?>?
                                                        <input type="hidden" name="Id_Invoice" class="form-control"
                                                            value="<?= $id; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="hapusInvoice"
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
</div>

<?php include ('./view/index/footer.php') ?>
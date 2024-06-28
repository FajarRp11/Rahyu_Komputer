<!-- css -->
<!-- <link rel="icon" href="favicon.ico">
<link rel="icon" href="icon.ico" type="image/ico">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style-manual.css" rel="stylesheet">
<link href="css/ruang-admin.min.css" rel="stylesheet"> -->
<h1>wlwlwlwll</h1>


<?php
// include ('koneksi.php');
// include ('proses_invoice.php');
include ('koneksi.php');
$getID = $_GET['id'];
if (!isset($_GET['id'])) {
    echo '<script>alert("Data Tidak Di Temukan");history.go(-1);</script>';
}

$queryDetail = "SELECT tht.*, tdt.*, tc.*, tk.*, tb.*  
                            FROM 
                                tabel_header_transaksi tht
                            JOIN
                                tabel_detail_transaksi tdt ON tht.Id_Invoice = tdt.Id_Invoice
                            JOIN
                                tabel_barang tb ON tb.Id_Barang = tdt.Id_Barang
                            JOIN 
                                tabel_customer tc ON tht.Id_Customer = tc.Id_Customer 
                            JOIN
                                tabel_kasir tk ON tht.Id_Kasir = tk.Id_Kasir
                            WHERE
                                tht.Id_Invoice = '$getID'
                            ORDER BY tht.Id_Invoice ASC";
$hasilDetail = mysqli_query($koneksi, $queryDetail);

if ($hasilDetail) {
    while ($data = mysqli_fetch_assoc($hasilDetail)) {
        // Detail Customer
        $Nama_Customer = $data['Nama_Customer'];
        $Telepon_Customer = $data['Telepon_Customer'];
        $Alamat_Customer = $data['Alamat_Customer'];

        // Detail Kasir
        $Nama_Kasir = $data['Nama_Kasir'];
        $Telepon_Kasir = $data['Telepon_Kasir'];

        // Detail Invoice
        $ID_Invoice = $data['Id_Invoice'];
        $Tanggal = $data['Tanggal'];
        $Nama_Barang = $data['Nama_Barang'];
        $Harga = $data['Harga'];
        $Jumlah = $data['Jumlah_Barang'];
    }
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 pl-2">Data Invoice</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Rahyu Komputer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Invoice</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <ass="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Invoice</h6>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahCustomer">
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
                                <td>
                                    <?= $data['Id_Invoice'] ?></td>
                                <td><?= $data['Tanggal'] ?></td>
                                <td><?= $data['Nama_Customer'] ?></td>
                                <td><?= $data['Nama_Kasir'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit<?= $id; ?>">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete<?= $id; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?page=view_detail&id=<?= $id ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>

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

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    Logout </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="models/proses_logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>



    <!-- List library javascript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>

    <!-- List library javascript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
<?php
include ('koneksi.php');
$getID = $_GET['id'];
if (!isset($_GET['id'])) {
    echo '<script>alert("Data Tidak Di Temukan");history.go(-1);</script>';
}

function ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}

$queryDetail = "SELECT tht.*, tdt.*, tc.*, tk.*, tb.*, tdt.Jumlah_Bayar  
                FROM tabel_header_transaksi tht
                JOIN tabel_detail_transaksi tdt ON tht.Id_Invoice = tdt.Id_Invoice
                JOIN tabel_barang tb ON tb.Id_Barang = tdt.Id_Barang
                JOIN tabel_customer tc ON tht.Id_Customer = tc.Id_Customer 
                JOIN tabel_kasir tk ON tht.Id_Kasir = tk.Id_Kasir
                WHERE tht.Id_Invoice = '$getID'
                ORDER BY tht.Id_Invoice ASC";
$hasilDetail = mysqli_query($koneksi, $queryDetail);

$cekHeader = mysqli_query($koneksi, "SELECT tht.*, tc.*, tk.* FROM 
                                    tabel_header_transaksi tht
                                    JOIN tabel_customer tc ON tht.Id_Customer = tc.Id_Customer 
                                    JOIN tabel_kasir tk ON tht.Id_Kasir = tk.Id_Kasir
                                    WHERE tht.Id_Invoice = '$getID'");
$dataHeader = mysqli_fetch_assoc($cekHeader);

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="text-right">
        <a href="index.php?page=invoice-utama">
            <button class="btn btn-primary mb-2">
                <i class="fa fa-arrow-left fa-xs"></i> Kembali
            </button>
        </a>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h6 class="mb-1"><strong>Invoice : <?= $dataHeader['Id_Invoice'] ?> </strong></h6>
            <p class=" mb-0">Tanggal : <?= $dataHeader['Tanggal'] ?></p>
            <p class=" mb-0">Kasir : <?= $dataHeader['Nama_Kasir'] ?></p>
        </div>
        <div class="col-sm-6">
            <p class=" mb-0">Nama : <?= $dataHeader['Nama_Customer'] ?></p>
            <p class=" mb-0">Telepon : <?= $dataHeader['Telepon_Customer'] ?></p>
            <p class=" mb-0">Alamat : <?= $dataHeader['Alamat_Customer'] ?></p>
        </div>
    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $totalKeseluruhan = 0;
                $jumlahBayar = 0;
                while ($detailInvoice = mysqli_fetch_array($hasilDetail)) {
                    $subtotal = $detailInvoice['Jumlah_Barang'] * $detailInvoice['Harga'];
                    $totalKeseluruhan += $subtotal;
                    $jumlahBayar = $detailInvoice['Jumlah_Bayar'];
                    ?>

                    <tr>
                        <td style="border: 1px solid #dee2e6;"><?= $no++ ?></td>
                        <td style="border: 1px solid #dee2e6;"><?= $detailInvoice['Nama_Barang'] ?></td>
                        <td style="border: 1px solid #dee2e6;"><?= $detailInvoice['Jumlah_Barang'] ?></td>
                        <td style="border: 1px solid #dee2e6;">Rp. <?= ribuan($detailInvoice['Harga']) ?></td>
                        <td style="border: 1px solid #dee2e6;">Rp. <?= ribuan($subtotal) ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            <tr>
                <th class="d-none d-md-block border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Total :</th>
                <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">
                    Rp. <?= ribuan($totalKeseluruhan) ?></th>
            </tr>
            <tr>
                <th class="d-none d-md-block border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Jumlah Bayar :</th>
                <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">
                    Rp. <?= ribuan($jumlahBayar) ?></th>
            </tr>
            <tr>
                <th class="d-none d-md-block border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="border-0 bg-white"></th>
                <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Kembali :</th>
                <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">
                    Rp. <?= ribuan($jumlahBayar - $totalKeseluruhan) ?></th>
            </tr>
        </table>
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
    </div>
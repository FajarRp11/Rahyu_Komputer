<?php

include ('koneksi.php');

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

// DETAIL INVOICE
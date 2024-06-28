<?php
if (isset($_POST['login'])) {
    $ID_Kasir = $_POST['ID_Kasir'];
    $Nama_Kasir = $_POST['Nama_Kasir'];

    $query = mysqli_query($koneksi, "SELECT * FROM tabel_kasir WHERE Id_Kasir = '$ID_Kasir' AND Nama_Kasir = '$Nama_Kasir'");
    $result = mysqli_fetch_assoc($query);
    $hitung = mysqli_num_rows($query);

    if ($hitung > 0) {
        session_start();
        $_SESSION['log'] = 'true';
        $_SESSION['nama'] = $result['Nama_Kasir'];
        header('location: index.php?page=home');
    } else {
        header('location: login.php');
        $error_message = true;
    }
}
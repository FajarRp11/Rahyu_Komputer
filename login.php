<?php
include ('koneksi.php');
include ('models/proses_login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Rahyu Komputer</title>
</head>

<body>
    <?php if (isset($error_message)) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Username atau password salah!
        </div>
    <?php } ?>
    <div class="image"></div>
    <form method="POST">
        <div class="logo">
            <img src="./img/laptop-solid.svg" alt="">
            <p>Rahyu Komputer</p>
        </div>
        <div class="input-grup">
            <label for="ID_Kasir">ID Kasir</label>
            <input type="text" name="ID_Kasir" id="ID_Kasir">
        </div>
        <div class="input-grup">
            <label for="Nama_Kasir">Nama Kasir</label>
            <input type="Nama_Kasir" name="Nama_Kasir" id="Nama_Kasir">
        </div>
        <input type="submit" value="Login" id="tombolLogin" name="login">
    </form>
</body>

</html>
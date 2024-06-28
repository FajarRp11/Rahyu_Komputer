<?php
//menambah data HP
include 'koneksi.php'; // Memasukkan file koneksi.php

if (isset($_POST['tambahKasir'])) {
	$ID_Kasir = $_POST['ID_Kasir'];
	$Nama_Kasir = $_POST['Nama_Kasir'];
	$Telepon = $_POST['Telepon_Kasir'];

	// Cek data
	$query = "SELECT * FROM `tabel_kasir` WHERE `Id_Kasir` LIKE '$ID_Kasir'";
	$hasil = mysqli_query($koneksi, $query);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah == 0) {
		$query = "INSERT INTO `tabel_kasir` (`Id_Kasir`, `Nama_Kasir`, `Telepon_Kasir`) VALUES ('$ID_Kasir', '$Nama_Kasir', '$Telepon')";
		$tambah = mysqli_query($koneksi, $query);
		if ($tambah) {
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h6><i class="fas fa-check"></i><b> Success Entry!</b></h6>
			</div>
			<?php
			header('location:index.php?page=kasir');
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
			</div>
			<?php
			header('location:index.php?page=kasir');
		}
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal! Barang yang anda masukkan sudah ada!</b></h6>
		</div>
		<?php
		header('location:index.php?page=kasir');
	}
}

//update Data HP
if (isset($_POST['editKasir'])) {
	$ID_Kasir = $_POST['ID_Kasir'];
	$Nama_Kasir = $_POST['Nama_Kasir'];
	$Telepon = $_POST['Telepon_Kasir'];

	// Query update data
	$query = "UPDATE tabel_kasir SET Nama_Kasir = '$Nama_Kasir', Telepon_Kasir ='$Telepon' WHERE Id_Kasir = '$ID_Kasir'";
	$edit = mysqli_query($koneksi, $query);
	if ($edit) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-check"></i><b> Success Update!</b></h6>
		</div>
		<?php
		header('location:index.php?page=kasir');
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
		</div>
		<?php
		header('location:index.php?page=kasir');
	}
}


//menghapus data HP
if (isset($_POST['hapusKasir'])) {
	$ID_Kasir = $_POST['ID_Kasir'];

	$query = "DELETE FROM `tabel_kasir` WHERE Id_Kasir = '$ID_Kasir'";
	$hapus = mysqli_query($koneksi, $query);
	if ($hapus) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-check"></i><b> Data Terhapus !</b></h6>
		</div>
		<?php
		header('location:index.php?page=kasir');
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
		</div>
		<?php
		header('location:index.php?page=kasir');
	}
}
?>
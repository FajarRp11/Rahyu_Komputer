<?php
//menambah data Customer
include 'koneksi.php'; // Memasukkan file koneksi.php

if (isset($_POST['tambahCustomer'])) {
	$ID_Customer = $_POST['ID_Customer'];
	$Nama_Customer = $_POST['Nama_Customer'];
	$Telepon = $_POST['Telepon_Customer'];
	$Alamat = $_POST['Alamat_Customer'];

	// Cek data
	$query = "SELECT * FROM `tabel_customer` WHERE `Id_Customer` LIKE '$ID_Customer'";
	$hasil = mysqli_query($koneksi, $query);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah == 0) {
		$query = "INSERT INTO `tabel_customer` (`Id_Customer`, `Nama_Customer`, `Telepon_Customer`, `Alamat_Customer`) VALUES ('$ID_Customer', '$Nama_Customer', '$Telepon', '$Alamat')";
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
			header('location:index.php?page=customer');
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
			</div>
			<?php
			header('location:index.php?page=customer');
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
		header('location:index.php?page=customer');
	}
}

//update Data Customer
if (isset($_POST['editCustomer'])) {
	$ID_Customer = $_POST['ID_Customer'];
	$Nama_Customer = $_POST['Nama_Customer'];
	$Telepon = $_POST['Telepon_Customer'];
	$Alamat = $_POST['Alamat_Customer'];

	// Query update data
	$query = "UPDATE tabel_customer SET Nama_Customer = '$Nama_Customer', Telepon_Customer ='$Telepon', Alamat_Customer ='$Alamat' WHERE Id_Customer = '$ID_Customer'";
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
		header('location:index.php?page=customer');
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
		</div>
		<?php
		header('location:index.php?page=customer');
	}
}


//menghapus data Customer
if (isset($_POST['hapusCustomer'])) {
	$ID_Customer = $_POST['ID_Customer'];

	$query = "DELETE FROM `tabel_customer` WHERE Id_Customer = '$ID_Customer'";
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
		header('location:index.php?page=customer');
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
		</div>
		<?php
		header('location:index.php?page=customer');
	}
}
?>
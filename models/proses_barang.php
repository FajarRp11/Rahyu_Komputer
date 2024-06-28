<?php
//menambah data HP
include 'koneksi.php'; // Memasukkan file koneksi.php

if (isset($_POST['tambahBarang'])) {
	$ID_Barang = $_POST['ID_Barang'];
	$Nama_Barang = $_POST['Nama_Barang'];
	$Harga = $_POST['Harga_Barang'];
	$Stock = $_POST['Stock_Barang'];

	// Cek data
	$query = "SELECT * FROM `tabel_barang` WHERE `Id_Barang` LIKE '$ID_Barang'";
	$hasil = mysqli_query($koneksi, $query);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah == 0) {
		$query = "INSERT INTO `tabel_barang` (`Id_Barang`, `Nama_Barang`, `Harga`, `Stock`) VALUES ('$ID_Barang', '$Nama_Barang', '$Harga', '$Stock')";
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
			header('location:index.php?page=barang');
		} else {
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
	} else {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h6><i class="fas fa-ban"></i><b> Gagal! Barang yang anda masukkan sudah ada!</b></h6>
		</div>
		<?php
		header('location:index.php?page=barang');
	}
}

//update Data HP
if (isset($_POST['editBarang'])) {
	$ID_Barang = $_POST['ID_Barang'];
	$Nama_Barang = $_POST['Nama_Barang'];
	$Harga = $_POST['Harga_Barang'];
	$Stock = $_POST['Stock_Barang'];

	// Query update data
	$query = "UPDATE tabel_barang SET Nama_Barang = '$Nama_Barang', Harga ='$Harga', Stock='$Stock' WHERE Id_Barang = '$ID_Barang'";
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
		header('location:index.php?page=barang');
	} else {
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


//menghapus data HP
if (isset($_POST['hapusBarang'])) {
	$ID_Barang = $_POST['ID_Barang'];

	$query = "DELETE FROM `tabel_barang` WHERE Id_Barang = '$ID_Barang'";
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
		header('location:index.php?page=barang');
	} else {
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
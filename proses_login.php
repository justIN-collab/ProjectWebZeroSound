	<?php 
	session_start();
	include 'koneksi.php';

	$nama = $_POST ['nama'];
	$password = $_POST ['password'];

	$login = mysqli_query($koneksi, "SELECT * FROM register WHERE nama='$nama' and password='$password'");
	$cek = mysqli_num_rows($login);


// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);


	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="pengguna"){

		// buat session login dan username
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "pengguna	";
		// alihkan ke halaman dashboard admin
		header("location:start_sl.php");
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
$_SESSION["login"] = true;

?>
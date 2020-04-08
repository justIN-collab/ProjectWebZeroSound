<?php 

	include 'koneksi.php';

	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$query = "INSERT INTO register ( nama, password, email ) VALUES ('$nama','$password', '$email')";
	$hasil = mysqli_query($koneksi, $query);
	if(!$koneksi){
		die("Tidak dapat diakses.").mysqli_errno($koneksi).'-'.mysqli_error($koneksi);
	}else{
		echo "<script>alert('Pendaftaran Berhasil ! Silahkan Login !');window.location='login.php'</script>";
	}

 ?>
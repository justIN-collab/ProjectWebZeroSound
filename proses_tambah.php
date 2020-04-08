<?php


include 'test.php';

$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$gambar_produk = $_FILES['gambar_produk']['name'];


$query = " INSERT INTO tabelbapak ( nama_produk,deskripsi,harga_beli,harga_jual,gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
$result = mysqli_query($koneksi,$query);

if(!$result){
	die("Query gagal dijalankan:". mysqli_errno($koneksi)." - ".mysqli_error($koneksi));

} else {

	echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
}


?>
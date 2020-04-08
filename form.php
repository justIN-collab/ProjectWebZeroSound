<?php 


include('test.php');

?>





<!DOCTYPE html>
<html>
<head>
	<title>Formulir</title>
</head>
<body>
	<center>
		<h1>Tambah produk</h1>
		<center>
			<form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
				<section class="base">
					<div>
						<label>Nama Produk</label>
						<input type="text" name="nama_produk" autofocus="" required="" />
					</div>
					<div>
						<label>Deskripsi</label>
						<input type="text" name="deskripsi" />
					</div>
					<div>
						<label>Harga Beli</label>
						<input type="text" name="harga_beli" />
					</div>
					<div>
						<label>Harga Jual</label>
						<input type="text" name="harga_jual" />
					</div>
					<div>
						<label>Gambar</label>
						<input type="file" name="gambar_produk" />
					</div>
					<button></button> type="submit">Btn</button>
					</div>
				</section>
			</form>
		</center>
	</center>

</body>
</html>
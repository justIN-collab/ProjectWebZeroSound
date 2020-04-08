<?php 

session_start();

$koneksi = new mysqli("localhost", "root", "", "sound");

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong,silahkan belanja dulu');</script>";
	echo "<script>location='start_sl.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="shopping-cart.css">
</head>
<body>
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Keranjang Belanja</h2>
		        </div>
		        <?php  foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
		        <?php 
		        $ambil = $koneksi->query("SELECT * FROM produk 
		        	WHERE id_produk = '$id_produk'");
		        $pecah = $ambil->fetch_assoc();
		        $subharga = $pecah["harga_produk"]*$jumlah;
		        ?>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img src="admin/foto_produk/<?php echo $pecah['foto_produk']; ?>" class="card-img-top" alt="...">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<div class="product-info">
									 							<div><h3><?php echo $pecah["nama_produk"]; ?></h3></div>
									 							<div><h5><?php echo $pecah["deskripsi_produk"]; ?></h5></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Jumlah:</label>
							 							<div><?php echo $jumlah; ?></div>
							 						</div>
							 						<div class="col-md-3 price">
							 							<label for="quantity">Harga Barang</label>
							 							<div>Rp. <?php echo number_format($pecah["harga_produk"]); ?>
							 								
							 							</div>	
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
				 				</div>
				 			</div>

			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Ringkasan Belanja</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">Rp.<?php echo number_format($subharga); ?></span></div>
			 					<a href="hapus.php?id=<?php echo $id_produk ?>" type="button" class="btn btn-danger btn-lg btn-block">Delete</a>
				 			</div>
			 			</div>
		 			</div> 
		 			<?php } ?>
	 		<a href="checkout.php" class="btn btn-primary btn-lg btn-block">Checkout</a>
	 		<a href="start_sl.php" class="btn btn-info btn-lg btn-block">Lanjut Belanja</a>
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
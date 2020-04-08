<?php  

session_start();
$koneksi = new mysqli("localhost", "root", "", "sound");

?>


<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="payment.css">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Checkout</h2>
        </div>
        <?php $totalbelanja = 0; ?>
         <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
		        <?php 
		        $ambil = $koneksi->query("SELECT * FROM produk 
		        	WHERE id_produk = '$id_produk'");
		        $pecah = $ambil->fetch_assoc();
		        $subharga = $pecah["harga_produk"]*$jumlah;
		        ?>
                   <?php $totalbelanja+=$subharga; ?>
	   				 

        <form>

          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">Rp.<?php echo number_format($subharga);?></span>
              <p class="item-name"><?php echo $pecah["nama_produk"]; ?></p>
              <p class="item-description"><?php echo $pecah["deskripsi_produk"];?></p>
            </div>
        </div>  
        <?php } ?> 
        </form>
        <form>      
            <div class="total" style="font-family: bauhaus93;, font-size: 25%;">Total<span class="price">    Rp.<?php echo number_format($totalbelanja);?></span></div>
            </form>

          <div class="card-details">
            <h3 class="title">Detail Penyewa</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Nama</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Nama" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Tanggal Penyewaan</label>
                <div class="input-group expiration-date">
                  <input type="date" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">-</span>
                  <input type="date" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Alamat</label>
                <input id="card-number" type="text" class="form-control" placeholder="Alamat" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">Nomor Telefon</label>
                <input id="cvc" type="number" class="form-control" placeholder="Telefon" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <a href="reminder_proses.php" type="button" class="btn btn-primary btn-block">Proceed</a>
              </div>
            </div>
          </div>
        </form>
      </div> 	
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
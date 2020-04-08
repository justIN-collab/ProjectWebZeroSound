<?php 

	$koneksi = mysqli_connect("localhost","root","","sound");

	if(!$koneksi){
		die("Tidak Dapat Terkoneksikan.".mysql_connect_error());
	}

 ?>
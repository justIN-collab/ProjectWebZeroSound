<?php 

session_start();
session_destroy();
	echo "<script> alert('Pesanan Telah Diproses');window.location='start_sl.php';</script>";
?>
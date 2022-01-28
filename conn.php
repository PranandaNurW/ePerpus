<?php 
//koneksi ke database phpdasar
	$db = mysqli_connect("localhost", "root", "", "db_eperpus");

	if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	exit();
	}

?>
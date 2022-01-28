<?php
require_once './conn.php';

	function query($query){
		global $db;
		//query select per row
		$result = mysqli_query($db, $query);

		//simpan tiap record ke wadah
		$rows = [];

		//ambil data/array tiap record per row
		while ($row = mysqli_fetch_assoc($result)) {
			//tiap row disimpan di rows
			$rows[] = $row;

		}
		return $rows;
	}

	function tambah_buku($data){
		global $db;

		$gambar = upload_buku();
			if(!$gambar){
				return false;
			}
		//ambil data dari tiap elemen form input
		$judul = htmlspecialchars($data["judul"]);
		$pengarang = htmlspecialchars($data["pengarang"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$jumlah = htmlspecialchars($data["jumlah"]);
		// $tanggal = htmlspecialchars($data["tanggal"]);
		
		//masukkan ke tabel buku
		$query = "INSERT INTO tb_buku VALUES 
			('', '$judul', '$pengarang', '$penerbit','$tahun', '$jumlah', '$gambar', NOW())";
		//query insert data
		mysqli_query($db, $query);
		//mengembalikkan gagal atau tidaknya insert ke tabel
		return mysqli_affected_rows($db);
	}

	function upload_buku(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		//cek apakah tidak ada gambar yang diupload
		if($error === 4){
			echo "<script> 
					alert('pilih gambar dahulu');
				</script>";
			return false;
		}

		//cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		//cek ekstensi gambar
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script> 
					alert('yang anda upload bukan gambar');
				</script>";
			return false;
		}

		//cek jika ukurannya terlalu besar
		if ($ukuranFile > 1000000) {
			echo "<script> 
					alert('ukuran gambar terlalu besar');
				</script>";
			return false;
		}

		//generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		//lolos pengecekan, gambar siap di upload
		move_uploaded_file($tmpName, './img/' . $namaFileBaru);
		return $namaFileBaru;

	}

	function hapus_buku($id){
		global $db;
		mysqli_query($db, "DELETE FROM tb_buku WHERE id_buku = $id");

		return mysqli_affected_rows($db);
	}

	function ubah_buku($data){
		global $db;

		$id = $data["id_buku"];
		$judul = htmlspecialchars($data["judul"]);
		$pengarang = htmlspecialchars($data["pengarang"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$jumlah = htmlspecialchars($data["jumlah"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		//cek apakah user pilih gambar atau tidak
		if( $_FILES["gambar"]["error"] === 4) {
			$gambar = $gambarLama;
		}
		else {
			$gambar = upload_buku();
		}

		$query = "UPDATE tb_buku SET 
					judul = '$judul',
					pengarang = '$pengarang',
					penerbit = '$penerbit',
					tahun_terbit = '$tahun',
					jumlah_buku = '$jumlah',
					gambar = '$gambar'		
				WHERE id_buku = $id
				";

		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}
?> 
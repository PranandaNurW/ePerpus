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

	function terlambat($batas_kembali, $tgl_telat) {

		$batas_kembali_pisah = explode("-", $batas_kembali);
		$batas_kembali_pisah = $batas_kembali_pisah[2]."-".$batas_kembali_pisah[1]."-".$batas_kembali_pisah[0];

		$tgl_telat_pisah = explode("-", $tgl_telat);
		$tgl_telat_pisah = $tgl_telat_pisah[2]."-".$tgl_telat_pisah[1]."-".$tgl_telat_pisah[0];

		$selisih = strtotime($tgl_telat_pisah) - strtotime($batas_kembali_pisah);

		$selisih = $selisih/86400;

		if ($selisih >= 1) {
			$hasil_hari = floor($selisih);
		} else {
			$hasil_hari = 0;
		}

		return $hasil_hari;
	}

	function countdown($tgl_pinjam, $batas_kembali) {

		$batas_kembali_pisah = explode("-", $batas_kembali);
		$batas_kembali_pisah = $batas_kembali_pisah[2]."-".$batas_kembali_pisah[1]."-".$batas_kembali_pisah[0];

		$tgl_pinjam_pisah = explode("-", $tgl_pinjam);
		$tgl_pinjam_pisah = $tgl_pinjam_pisah[2]."-".$tgl_pinjam_pisah[1]."-".$tgl_pinjam_pisah[0];

		$selisih = strtotime($batas_kembali_pisah) - strtotime($tgl_pinjam_pisah);

		$selisih = $selisih/86400;

		if ($selisih >= 1) {
			$hasil_hari = floor($selisih);
		} else {
			$hasil_hari = 0;
		}

		return $hasil_hari;
	}


?>
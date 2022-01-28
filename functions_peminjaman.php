<?php 
require_once './conn.php';

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

	function tambah_peminjaman($data) {
		global $db;

		$id_buku = $data["id_buku"];
		$id_user = $data["id_user"];
		$jumlah_buku = $data["jumlah_buku"]; //input tambah
		$tgl_pinjam = $data["tgl_pinjam"];
		$batas_kembali = $data["batas_kembali"];

		$sql = ("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
		$result = mysqli_query($db, $sql);

		while($jumlah = mysqli_fetch_assoc($result)) {
			$sisa = $jumlah['jumlah_buku']; //kolom jumlah database buku

			if ($sisa == 0) {
				echo "
					<script>
						alert('Stok buku habis, isi stok dulu!');
						document.location.href = 'admin.php?page=data-peminjaman&aksi=tambah';
					</script>
				";
			} elseif($jumlah_buku > $sisa) {
				echo "
					<script>
						alert('Stok buku tidak sebanyak itu');
						document.location.href = 'admin.php?page=data-peminjaman&aksi=tambah';
					</script>
				";
			} 

			else {
				$sql1 = mysqli_query($db, "INSERT INTO tb_peminjaman VALUES ('', '$id_buku', '$jumlah_buku', '$id_user', '$tgl_pinjam', '$batas_kembali', NULL, true)");
				$sql2 = mysqli_query($db, "SELECT id_peminjaman FROM tb_peminjaman ORDER BY id_peminjaman DESC LIMIT 1");
					$row = mysqli_fetch_assoc($sql2);
					$id_peminjaman = $row['id_peminjaman'];

				$sql3 = mysqli_query($db, "INSERT INTO tb_detail_pinjam VALUES ('', '$id_buku', '$jumlah_buku', '$id_peminjaman')");
				// $sql3 = mysqli_query($db, "UPDATE tb_buku SET jumlah_buku = (jumlah_buku-1) WHERE id_buku = '$id_buku'");

				return mysqli_affected_rows($db);
			}

		} 


	}
?>
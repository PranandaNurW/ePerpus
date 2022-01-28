<?php 
require_once './conn.php';

$id_peminjaman = $_GET['id'];
$telat = $_GET['telat'];
$batas_kembali = $_GET['tgl'];

	if ($telat >= 1) {
		echo "
			<script>
				alert('Kalau udah telat gabisa, bayar denda dulu dan kembalikan itu buku baru pinjam lagi');
				document.location.href = 'admin.php?page=data-peminjaman';
			</script>
		";

	} else {
		$batas_kembali_pisah = explode("-", $batas_kembali);
		$next_tujuh_hari = mktime(0, 0, 0, $batas_kembali_pisah[1], $batas_kembali_pisah[2]+7, $batas_kembali_pisah[0]);
		$hari_next = date("Y-m-d", $next_tujuh_hari);

		$sql = mysqli_query($db, "UPDATE tb_peminjaman SET batas_kembali = '$hari_next' WHERE id_peminjaman = '$id_peminjaman'");

		if ($sql) {
			echo "
			<script>
				alert('Berhasil diperpanjang');
				document.location.href = 'admin.php?page=data-peminjaman';
			</script>
			";
		} else {
			echo "
			<script>
				alert('Gagal berhasil diperpanjang');
				document.location.href = 'admin.php?page=data-peminjaman';
			</script>
			";
		}

	}

?>
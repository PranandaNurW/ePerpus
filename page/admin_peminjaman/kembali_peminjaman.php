<?php 
require_once './conn.php';

$id_peminjaman = $_GET["id"];

$sql = mysqli_query($db, "DELETE FROM tb_detail_pinjam WHERE id_peminjaman = $id_peminjaman");

echo "
	<script>
	alert('Proses Kembalikan Buku Berhasil');
	document.location.href = 'admin.php?page=data-peminjaman';
	</script>
";


?>
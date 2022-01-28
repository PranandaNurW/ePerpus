<?php 
$id = $_GET["id"];
if( hapus_akun($id) > 0){
	echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'admin.php?page=data-anggota';
			</script>
		";
}
else {
	echo "
			<script>
				alert('data gagal dihapus!');
			</script>
		";
}
?>

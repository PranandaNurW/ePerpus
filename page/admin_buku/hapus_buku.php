<?php 
$id = $_GET["id"];
if( hapus_buku($id) > 0){
	echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'admin.php?page=data-buku';
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

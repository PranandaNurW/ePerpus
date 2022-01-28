<?php 
$id = $_GET["id"];

if( tolak_pendaftar($id) > 0){
	echo "
			<script>
				alert('Pendaftar berhasil ditolak');
				document.location.href = '?page=data-pendaftar';
			</script>
		";
}
else {
	echo "
			<script>
				alert('Pendaftar gagal ditolak');
				document.location.href = '?page=data-pendaftar';
			</script>
		";
}

?>

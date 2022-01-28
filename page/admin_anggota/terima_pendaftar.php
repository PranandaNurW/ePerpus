<?php 
$id = $_GET["id"];

if( terima_pendaftar($id) > 0){
	echo "
			<script>
				alert('Pendaftar berhasil menjadi anggota eperpus');
				document.location.href = '?page=data-pendaftar';
			</script>
		";
}
else {
	echo "
			<script>
				alert('Pendaftar gagal ditambahkan');
				document.location.href = '?page=data-pendaftar';
			</script>
		";
}

?>

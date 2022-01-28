<?php  
require_once "./conn.php";

function pendaftaran($data){
	global $db;
		$username = strtolower(stripcslashes($data["username_pendaftar"]));
		$email = mysqli_real_escape_string($db, $data["email"]);
		$alamat = mysqli_real_escape_string($db, $data["alamat"]);
		$password = mysqli_real_escape_string($db, $data["password"]);
		$repassword = mysqli_real_escape_string($db, $data["repassword"]);
		$level = mysqli_real_escape_string($db, $data["level"]);

		//cek username agar tidak boleh sama
		$sql = "SELECT username FROM tb_users WHERE username = '$username'";
		$result = mysqli_query($db, $sql);
		$username_valid = mysqli_num_rows($result);

		if( $username_valid > 0 ) {
			echo "
			<script>
				alert('Username sudah dipakai, gunakan username lain!');
				document.location.href = 'register.php';
			</script>";
			return false;
		} 

		else {
		//cek konfirmasi password
			if ($password == $repassword) {

				//enkripsi password
				$password = password_hash($password, PASSWORD_DEFAULT);

				//tambah ke database
				mysqli_query($db, "INSERT INTO tb_users VALUES('', '$username', '$email', '$alamat', '$password', '$level', false, NOW())");

				return mysqli_affected_rows($db);

			} else {
				echo "<script>
							alert('Konfirmasi password tidak sesuai!');
							document.location.href = 'register.php';
						</script>";
				return false;
			}

		}
}

function terima_pendaftar($id){
		global $db;
		mysqli_query($db, "UPDATE tb_users SET status = true WHERE id_user = $id");

		return mysqli_affected_rows($db);
}

function tolak_pendaftar($id){
		global $db;
		mysqli_query($db, "DELETE FROM tb_users WHERE id_user = $id AND status = false");

		return mysqli_affected_rows($db);
}

function tambah_akun($data){
		global $db;

		//ambil data dari tiap elemen form input
		$username = strtolower(stripcslashes($data["username"]));
		$email = mysqli_real_escape_string($db, $data["email"]);
		$alamat = mysqli_real_escape_string($db, $data["alamat"]);
		$password = mysqli_real_escape_string($db, $data["password"]);
		$repassword = mysqli_real_escape_string($db, $data["repassword"]);
		$level = mysqli_real_escape_string($db, $data["level"]);
		
		//cek username agar tidak boleh sama
		$sql = "SELECT username FROM tb_users WHERE username = '$username'";
		$result = mysqli_query($db, $sql);
		$username_valid = mysqli_num_rows($result);

		if( $username_valid > 0 ) {
			echo "
			<script>
				alert('Username sudah dipakai, gunakan username lain!');
				document.location.href = 'admin.php?page=data-anggota&aksi=tambah';
			</script>";
			return false;
		} 

		else {
		//cek konfirmasi password
			if ($password == $repassword) {

				//enkripsi password
				$password = password_hash($password, PASSWORD_DEFAULT);

				//tambah ke database
				mysqli_query($db, "INSERT INTO tb_users VALUES('', '$username', '$email', '$alamat', '$password', '$level', true, NOW())");

				return mysqli_affected_rows($db);

			} else {
				echo "<script>
							alert('Konfirmasi password tidak sesuai!');
							document.location.href = 'admin.php?page=data-anggota&aksi=tambah';
						</script>";
				return false;
			}

		}
	}



function hapus_akun($id){
		global $db;
		mysqli_query($db, "DELETE FROM tb_users WHERE id_user = $id AND status = true");

		return mysqli_affected_rows($db);
}


function ubah_akun($data){
		global $db;

		$id_user = $data["id_user"];
		$username = strtolower(stripcslashes($data["username"]));
		$email = htmlspecialchars($data["email"]);
		$alamat = htmlspecialchars($data["alamat"]);

		$query = "UPDATE tb_users SET 
					username = '$username',
					email = '$email',
					alamat = '$alamat'
				WHERE id_user = $id_user AND status = true
				";

		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
}

?>
<?php 

    session_start();
    
    $level = @$_SESSION["level"];
    if ( $level == "anggota") {
        header("Location: anggota.php");
        exit;
    } elseif ( $level == "admin") {
        header("Location: admin.php");
        exit;
    }

require_once 'functions_akun.php';

if(isset($_POST["register"]) ) {

    if(pendaftaran($_POST) > 0) {
        echo "<script>
            alert('Berhasil mendaftar, silahkan tunggu admin untuk pembuatan akun anggota');
            document.location.href = 'index.php';
            </script>";
    }

    else {
        echo mysqli_error($db);
    }
}
?>

<?php include('header.php'); ?>


<body class="bg-gradient-primary">

    <div class="container-fluid my-5">
        <div class="row justify-content-center">

            <div class="card o-hidden border-0 shadow-lg my-5" style="width: 550px;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar menjadi anggota!</h1>
                        </div>
                        <form action="" method="post" class="user">
                            <div class="form-group">
                                <input type="text" name="username_pendaftar" class="form-control form-control-user" required
                                    placeholder="Username">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="email" class="form-control form-control-user" required
                                        placeholder="Email Address">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="alamat" class="form-control form-control-user" required 
                                        placeholder="Alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" required
                                        placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="repassword" class="form-control form-control-user" required
                                        placeholder="Repeat Password">
                                </div>
                                    <input type="hidden" name="level" value="anggota">
                                    
                                    
                            </div>
                            <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <small>Sudah memiliki akun?</small>
                            <a class="small" href="index.php"> Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
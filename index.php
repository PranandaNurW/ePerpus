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

    require_once "./conn.php";

if(isset($_POST["login"])) {
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']);

    //cek username dari database
    $query = mysqli_query($db, "SELECT * FROM tb_users WHERE username = '$username' AND status = true");
    $user_valid = mysqli_fetch_array($query);

    //cek jika terdaftar
    if ($user_valid) {
        //jika terdaftar
        if ( password_verify($password, $user_valid['password'])) {

            $level = $user_valid['level'];
            //jika sesuai
            $_SESSION['username'] = $user_valid['username'];
            $_SESSION['level'] = $level;
            $_SESSION['id_user'] = $user_valid['id_user'];

            //cek level
            if ($level == "anggota") {
                header('Location: anggota.php');
                exit;
            } elseif ($level == "admin") {
                header('Location: admin.php');
                exit;
            }
        } else{
            echo "
            <script>
                alert('Username/password salah');
                document.location.href = 'index.php';
            </script>";
        }
        
    } else {
        echo "
            <script>
                alert('Anda belum terdaftar');
                document.location.href = 'index.php';
            </script>";
    }
}
?>

<?php include('header.php'); ?>


<body class="bg-gradient-primary">

    <div class="container-fluid my-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">
    
          <!-- <div class="col-xs"> -->
            
                <div class="card o-hidden border-0 shadow-lg my-5" style="width: 400px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900">ePerpus</h1>
                                        <h6 class="h6 text-gray-900 mb-4">Please Log in</h3>
                                    </div>
                                    <form action="" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" required 
                                                name="username" 
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" required 
                                                name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <small>Belum memiliki akun?</small>
                                        <a class="small" href="register.php">Daftar menjadi anggota!</a>
                                    </div>
                                </div>
                            
                    </div>
                </div>

            <!-- </div> -->

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


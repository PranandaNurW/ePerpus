<?php 
session_start();
    if ($_SESSION["level"] == 'admin') {
        header("Location: admin.php");
    }
    //cek apakah udah login
    if( !isset($_SESSION["username"]) || !isset($_SESSION["level"]) ) {
        header("Location: index.php");
        exit;
     } 

?>

<?php require_once('./functions_anggota.php'); ?>

<?php include('header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> ePerpus <sup>9</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a href="?page=home" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a href="?page=daftarbuku" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Daftar buku</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a href="?page=pinjamanku" class="nav-link">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pinjamanku</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a href="?page=riwayat" class="nav-link">
                    <i class="fas fa-history"></i>
                    <span>Riwayat</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline py-2">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            
            <!-- Main Content -->
            <div id="content">

                <?php  
                @$page = $_GET['page'];
                @$aksi = $_GET['aksi'];

                    if ($page == "home") {
                        if ($aksi == "") {
                            include('page/anggota_home/anggota_home.php');
                        } elseif ($aksi == "lihat") {
                            include('page/detail_buku.php');
                        }
                    }

                    elseif ($page == "daftarbuku") {
                        if ($aksi == "") {
                            include('page/anggota_daftarbuku/anggota_daftarbuku.php');
                        } elseif ($aksi == "lihat") {
                            include('page/detail_buku.php');
                        }
                    }

                    elseif ($page == "pinjamanku") {
                        if ($aksi == "") {
                            include('page/anggota_pinjamanku/anggota_pinjamanku.php');
                        } 
                    }

                    elseif ($page == "riwayat") {
                        if ($aksi == "") {
                            include('page/anggota_riwayat/anggota_riwayat.php');
                        } 
                    } 

                    else {
                        include('page/anggota_home/anggota_home.php');
                    }


                ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>
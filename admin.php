<?php
session_start();
    if ($_SESSION["level"] == 'anggota') {
        header("Location: anggota.php");
    }

    //cek apakah udah login
    if( !isset($_SESSION["username"]) || !isset($_SESSION["level"]) ) {
        header("Location: index.php");
        exit;
     } 

?>
<?php require_once ('./conn.php'); ?>
<?php require_once ('functions_buku.php'); ?>
<?php require_once ('functions_akun.php'); ?>
<?php require_once ('functions_peminjaman.php'); ?>

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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a href="?page=admin-dashboard" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-circle"></i>
                    <span>Data User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=data-anggota">Data Anggota</a>
                        <a class="collapse-item" href="?page=data-pendaftar">Data Pendaftar</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a href="?page=data-buku" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Data Buku</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pinjam</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=data-peminjaman">Data Peminjaman</a>
                        <a class="collapse-item" href="?page=riwayat-peminjaman">Riwayat Peminjaman</a>
                    </div>
                </div>
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

                    if ($page == "admin-dashboard") {
                        if ($aksi == "") {
                            include('page/admin_dashboard/admin_dashboard.php');
                        } 
                    }

                    elseif ($page == "data-anggota") {
                        if ($aksi == "") {
                            include('page/admin_anggota/admin_anggota.php');
                        } elseif ($aksi == "tambah") {
                            include('page/admin_anggota/tambah_akun.php');
                        } elseif ($aksi == "ubah") {
                            include('page/admin_anggota/ubah_akun.php');
                        } elseif ($aksi == "hapus") {
                            include('page/admin_anggota/hapus_akun.php');
                        }
                    }

                    elseif ($page == "data-pendaftar") {
                        if ($aksi == "") {
                            include('page/admin_anggota/admin_pendaftar.php');
                        } elseif ($aksi == "terima") {
                            include('page/admin_anggota/terima_pendaftar.php');
                        } elseif ($aksi == "tolak") {
                            include('page/admin_anggota/tolak_pendaftar.php');
                        }
                    }

                    elseif ($page == "data-buku") {
                        if ($aksi == "") {
                            include('page/admin_buku/admin_buku.php');
                        } elseif ($aksi == "tambah") {
                            include('page/admin_buku/tambah_buku.php');
                        } elseif ($aksi == "ubah") {
                            include('page/admin_buku/ubah_buku.php');
                        } elseif ($aksi == "hapus") {
                            include('page/admin_buku/hapus_buku.php');
                        }
                    }

                    elseif ($page == "data-peminjaman") {
                        if ($aksi == "") {
                            include('page/admin_peminjaman/admin_peminjaman.php');
                        } elseif ($aksi == "tambah") {
                            include('page/admin_peminjaman/tambah_peminjaman.php');
                        } elseif ($aksi == "kembali") {
                            include('page/admin_peminjaman/kembali_peminjaman.php');
                        } elseif ($aksi == "perpanjang") {
                            include('page/admin_peminjaman/perpanjang_peminjaman.php');
                        } 
                    } 

                    elseif($page == "riwayat-peminjaman") {
                        if ($aksi == "") {
                            include('page/admin_peminjaman/riwayat_peminjaman.php');
                        }
                    }

                    else {
                        include('page/admin_dashboard/admin_dashboard.php');
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

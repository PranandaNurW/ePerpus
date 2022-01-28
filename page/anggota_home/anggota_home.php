
            <!-- Main Content -->
            <div id="anggota-home">

                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= $_SESSION['username']; ?>!</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Buku yang sedang dipinjam</div>
                                                 <?php 
                                                $id_sekarang = $_SESSION['id_user'];
                                                $sql3 = "SELECT count(id_peminjaman) AS jumlah FROM tb_peminjaman WHERE status = true AND id_user = $id_sekarang";
                                                $query = mysqli_query($db, $sql3); 
                                                $result = mysqli_num_rows($query); ?>

                                            <?php if ($result > 0) { ?>
                                               
                                                <?php while ($row1 = mysqli_fetch_assoc($query)) { ?>
                                                
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row1['jumlah']; ?></div>
                                                    <small>Terdapat <?php echo $row1['jumlah']; ?> <span>

                                                    </span> buku yang sedang anda pinjam</small>

                                                <?php } ?>

                                            <?php } else { ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                                    <small>Terdapat 0 <span>

                                                    </span> buku yang sedang anda pinjam</small>
                                            <?php } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php 
                                            $user_saat_ini = $_SESSION['id_user'];
                                            $sql2 = "SELECT a.*, b.* FROM tb_peminjaman AS a INNER JOIN tb_buku AS b ON a.id_buku = b.id_buku WHERE a.id_user = $user_saat_ini AND a.status = 1 AND a.batas_kembali > CURRENT_DATE ORDER BY a.batas_kembali ASC LIMIT 1";
                                            $query = mysqli_query($db, $sql2); 
                                            $result = mysqli_num_rows($query); ?>

                                                <?php if ($result > 0) { ?>
                                               
                                                <?php while ($row2 = mysqli_fetch_assoc($query)) { ?>
                                                    <?php  $tgl_pinjam = date("Y-m-d");
                                                            $batas_kembali = $row2['batas_kembali'];

                                                            $hitung = countdown($tgl_pinjam, $batas_kembali); ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Batas pengembalian terdekat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row2['judul']; ?></div>

                                            <small>Tersisa 
                                            <span>
                                            <?php echo $hitung;?> hari
                                            </span>
                                            </small>
                                                <?php } ?>
                                
                                            <?php  } else { ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Buku yang harus segera dikembalikan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Tidak ada</div>
                                            <small>Tersisa 
                                            <span>
                                            0 hari
                                            </span>
                                            </small>
                                                <?php } ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <?php 
                                            $user_saat_ini = $_SESSION['id_user'];
                                            $sql = "SELECT a.*, b.* FROM tb_peminjaman AS a INNER JOIN tb_buku AS b ON a.id_buku = b.id_buku WHERE a.id_user = $user_saat_ini AND a.status = 1 AND a.batas_kembali < CURRENT_DATE ORDER BY a.batas_kembali ASC LIMIT 1";
                                            $result = mysqli_query($db, $sql); 
                                            $dekat = mysqli_num_rows($result);?>

                                                    <?php if ($dekat > 0) { ?>
                                                        <?php while ($row3 = mysqli_fetch_assoc($result)) { ?>

       
                                                            <?php  $denda_hari = 1000;

                                                            $batas_kembali = $row3['batas_kembali'];
                                                            $tgl_telat = date("Y-m-d");

                                                            $telat = terlambat($batas_kembali, $tgl_telat);

                                                            $denda = $telat * $denda_hari; ?>
                                                                <?php if ($telat > 0) :?>
                                                        
                                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                                Pinjaman paling terlambat </div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row3['judul']; ?></div>
                                                            <small>Terlambat
                                                            <span> 
                                                                    <?= $telat ." hari"; ?>
                                                            </span>
                                                            </small> |
                                                            <small>Denda Rp
                                                            <span> 
                                                                    <?= $denda; ?>
                                                            </span>
                                                            </small> 
                                                                <?php endif; ?>
                                                         <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                          Pinjaman paling terlambat</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">0 hari</div>

                                                        <small>Denda<span> Rp 0</span></small>
                                                    <?php } ?>

                                                
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- top 10 -->
                    
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card shadow mb-4 py-1 px-5 h-100">
                                    <div class="d-sm-flex align-items-center justify-content-between mt-4 py-2">
                                        <h1 class="h4 mb-0 text-gray-800">Top 7 Buku yang sering dipinjam di ePerpus</h1>
                                    </div>

                                    <hr>
                                    <?php 
                                    // $bukutop = query("SELECT COUNT(a.id_peminjaman) AS top7, a.id_buku, b.judul, b.gambar from tb_peminjaman AS a INNER JOIN tb_buku AS b ON a.id_buku = b.id_buku GROUP BY a.id_buku ORDER BY top7 DESC LIMIT 7"); 
                                        $bukutop = query("SELECT * FROM top7");
                                    ?>
                                                        
                                    <div class="owl-carousel owl-theme">
                                        <?php $i=1; ?>
                                        <?php foreach($bukutop as $row3) :?>
                                        <div class="item py-2">
                                            <div class="product">
                                                <div class="text-center">
                                                    <a href="<?php printf('%s&id_buku=%s', 'anggota.php?page=home&aksi=lihat', $row3['id_buku']) ?>"><img src="./img/<?= $row3['gambar']??"./img/5cm.jpg"; ?>" alt="buku" class="img-fluid mx-auto" style="width: 213px; height: 289px;"></a>
                                                </div>
                                                <div class="text-center">
                                                    <h6 class="mt-3 text-primary font-weight-bold">TOP <?= $i++; ?></h5>
                                                    <h6 class="py-1"> <?= $row3['judul']; ?> </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
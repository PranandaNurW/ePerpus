
            <!-- Main Content -->
            <div id="admin-dashboard">

                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php 
                                                $anggota = query("SELECT count(id_user) AS jumlah FROM tb_users WHERE status = true AND level = 'anggota'");
                                                foreach($anggota as $row1){
                                                    echo $row1['jumlah'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah Pendaftar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php  
                                                $pendaftar = query("SELECT count(id_user) AS jumlah FROM tb_users WHERE status = false AND level = 'anggota'");
                                                foreach($pendaftar as $row2){
                                                    echo $row2['jumlah'];
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-key fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php 
                                                $buku = query("SELECT count(id_buku) AS jumlah FROM tb_buku");
                                                foreach($buku as $row3){
                                                    echo $row3['jumlah'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                       <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Transaksi Peminjaman</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php 
                                                $pinjam = query("SELECT count(id_peminjaman) AS jumlah FROM tb_peminjaman");
                                                foreach($pinjam as $row4){
                                                    echo $row4['jumlah'];
                                                } 
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- top 10 -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 7 Anggota di ePerpus</h1>
                                </div>

                                <div class="card-body">
                                    <?php 
                                    // $anggotatop = query("SELECT COUNT(a.id_peminjaman) AS top7, a.id_user, b.username from tb_peminjaman AS a INNER JOIN tb_users AS b ON a.id_user = b.id_user GROUP BY a.id_user ORDER BY top7 DESC LIMIT 7"); 
                                    $anggotatop = query("SELECT * FROM top7a");
                                    ?>
                                    <?php $i = 1; ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th>Top</th>
                                            <th>Username</th>
                                            <th>Total Peminjaman</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($anggotatop as $row5) : ?>
                                        <tr>
                                            
                                            <td><?= $i++; ?></td>
                                            <td><?= $row5['username']; ?></td>
                                            <td><?= $row5['top7a'];?></td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 7 Buku di ePerpus</h1>
                                </div>

                                <div class="card-body">                                          
                                    <div class="owl-carousel owl-theme">

                                        <?php 
                                        // $bukutop = query("SELECT COUNT(a.id_peminjaman) AS top7, a.id_buku, b.judul, b.gambar from tb_peminjaman AS a INNER JOIN tb_buku AS b ON a.id_buku = b.id_buku GROUP BY a.id_buku ORDER BY top7 DESC LIMIT 7"); 
                                        $bukutop = query("SELECT * FROM top7");
                                        ?>

                                        <?php $i=1; ?>
                                        <?php foreach($bukutop as $row6) :?>
                                        <div class="item py-2">
                                            <div class="product">
                                                <div class="text-center">
                                                    <a href="<?php printf('%s&id_buku=%s', 'admin.php?page=admin-dashboard', $row6['id_buku']) ?>"><img src="./img/<?= $row6['gambar']??"./img/5cm.jpg"; ?>" alt="buku" class="img-fluid mx-auto" style="width: 213px; height: 289px;"></a>
                                                </div>
                                                <div class="text-center">
                                                    <h6 class="py-2">TOP <?= $i++; ?></h5>
                                                    <h6 class="py-1"> <?= $row6['judul']; ?> </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
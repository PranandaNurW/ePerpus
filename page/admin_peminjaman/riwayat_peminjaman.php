            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                	<!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Riwayat peminjaman</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <font size="2">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Buku</th>
                                            <th>Jumlah</th>
                                            <th>Username</th>
                                            <th>Tgl Pinjam</th>
                                            <th>Batas Kembali</th>
                                            <th>Tgl Kembali</th>
                                            <th>Terlambat</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $peminjaman = query("
                                            SELECT a.*, b.id_buku, b.judul, b.gambar, c.id_user, c.username, c.email, c.alamat
                                            FROM tb_peminjaman AS a 
                                            INNER JOIN tb_buku AS b ON a.id_buku = b.id_buku
                                            INNER JOIN tb_users AS c ON a.id_user = c.id_user
                                            WHERE a.status = false ORDER BY a.tgl_kembali DESC
                                            ");

                                            foreach ($peminjaman as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $i; ?></td>

                                                    <td><?= $row['judul']; ?><button class="mr-2 float-right" data-toggle="modal" data-target="#admin-riwayat1<?php echo $row['id_buku'];?>"
                                                        style=" border: none;
                                                                background: none;
                                                                cursor: pointer;
                                                                margin: 0;
                                                                padding: 0;">
                                                    <i class="fas fa-info-circle fa-1x text-success"></i></button>
                                                    </td>

                                                    <!-- modal -->
                                                        <div id="admin-riwayat1<?php echo $row['id_buku'];?>" class="modal fade" role="dialog">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              <div class="modal-body text-center">
                                                                <h5><?= $row['judul']; ?></h5>
                                                                <img src="./img/<?= $row['gambar']??"./img/5cm.jpg"; ?>" alt="buku" class="img-fluid mx-auto" style="width: 213px; height: 289px;">
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                                                              </div>
                                                            </div>

                                                          </div>
                                                        </div>
                                                    <!-- /modal -->

                                                    <td><?= $row['jumlah_buku']; ?></td>

                                                    <td><?= $row['username']; ?><button class="mr-2 float-right" data-toggle="modal" data-target="#admin-riwayat2<?php echo $row['id_user'];?>" 
                                                        style=" border: none;
                                                                background: none;
                                                                cursor: pointer;
                                                                margin: 0;
                                                                padding: 0;">
                                                    <i class="fas fa-info-circle fa-1x text-success"></i></button>
                                                    </td>

                                                    <!-- modal -->
                                                        <div id="admin-riwayat2<?php echo $row['id_user'];?>" class="modal fade" role="dialog">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              <div class="modal-body text-center">
                                                                <h6>Nama : <?= $row['username']; ?></h6>
                                                                <h6>Email : <?= $row['email']; ?></h6>
                                                                <h6>Alamat : <?= $row['alamat']; ?></h6>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                                                              </div>
                                                            </div>

                                                          </div>
                                                        </div>
                                                    <!-- /modal -->


                                                    <td><?= $row['tgl_pinjam']; ?></td>
                                                    <td><?= $row['batas_kembali']; ?></td>
                                                    <td><?= $row['tgl_kembali'] ?></td>
                                                    <td>
                                                        <?php  

                                                        $denda_hari = 1000;

                                                        $batas_kembali = $row['batas_kembali'];
                                                        $tgl_kembali = $row['tgl_kembali'];

                                                        $telat = terlambat($batas_kembali, $tgl_kembali);

                                                        $denda = $telat * $denda_hari;

                                                        if ($telat > 0) {
                                                            echo "
                                                                <font color='red'>$telat hari<br>Denda : Rp$denda</font> 
                                                            ";
                                                        } else {
                                                            echo $telat." hari";
                                                        }

                                                        ?>


                                                    </td>
                                                </tr>

                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                       
                                    </tbody>
                                       
                                    </tbody>
                                </table>
                                </font>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 
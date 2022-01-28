            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pinjamanku</h1>

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
                                            <th>Terlambat</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $id_sekarang = $_SESSION['id_user'];
                                            $peminjaman = query("
                                            SELECT a.*, b.*, c.id_buku, c.judul, c.gambar, d.id_user, d.username
                                            FROM tb_peminjaman AS a 
                                            INNER JOIN tb_detail_pinjam AS b ON a.id_peminjaman = b.id_peminjaman
                                            INNER JOIN tb_buku AS c ON b.id_buku = c.id_buku
                                            INNER JOIN tb_users AS d ON a.id_user = d.id_user
                                            WHERE a.status = true AND a.id_user = $id_sekarang ORDER BY tgl_pinjam
                                            ");

                                            foreach ($peminjaman as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $i; ?></td>

                                                    <td><?= $row['judul']; ?><button class="mr-2 float-right" data-toggle="modal" data-target="#anggota-pinjam1<?php echo $row['id_buku'];?>"
                                                        style=" border: none;
                                                                background: none;
                                                                cursor: pointer;
                                                                margin: 0;
                                                                padding: 0;">
                                                    <i class="fas fa-info-circle fa-1x text-success"></i></button>
                                                    </td>

                                                    <!-- modal -->
                                                        <div id="anggota-pinjam1<?php echo $row['id_buku'];?>" class="modal fade" role="dialog">
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
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['tgl_pinjam']; ?></td>
                                                    <td><?= $row['batas_kembali']; ?></td>
                                                    <td>
                                                        <?php  

                                                        $denda_hari = 1000;

                                                        $batas_kembali = $row['batas_kembali'];
                                                        $tgl_telat = date("Y-m-d");

                                                        $telat = terlambat($batas_kembali, $tgl_telat);

                                                        $denda = $telat * $denda_hari;

                                                        if ($telat > 0) {
                                                            echo "
                                                                <font color='red'>$telat hari<br>Denda : Rp$denda</font> 
                                                            ";
                                                        } else {
                                                            echo $telat ." hari";
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

 
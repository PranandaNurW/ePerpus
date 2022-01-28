            <!-- Main Content -->
            <div id="content1">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables peminjaman</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=data-peminjaman&aksi=tambah" class="btn btn-primary">Tambah peminjaman</a>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $peminjaman = query("
                                            SELECT a.*, b.*, c.id_buku, c.judul, c.gambar, c.jumlah_buku AS stok, d.id_user, d.username, d.email, d.alamat
                                            FROM tb_peminjaman AS a 
                                            INNER JOIN tb_detail_pinjam AS b ON a.id_peminjaman = b.id_peminjaman
                                            INNER JOIN tb_buku AS c ON b.id_buku = c.id_buku
                                            INNER JOIN tb_users AS d ON a.id_user = d.id_user
                                            WHERE a.status = true ORDER BY a.id_peminjaman DESC
                                            ");

                                            foreach ($peminjaman as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $i; ?></td>

                                                    <td><?= $row['judul']; ?><button class="mr-2 float-right" data-toggle="modal" data-target="#admin-pinjam1<?php echo $row['id_buku'];?>"
                                                        style=" border: none;
                                                                background: none;
                                                                cursor: pointer;
                                                                margin: 0;
                                                                padding: 0;">
                                                    <i class="fas fa-info-circle fa-1x text-success"></i></button>
                                                    </td>

                                                    <!-- modal -->
                                                        <div id="admin-pinjam1<?php echo $row['id_buku'];?>" class="modal fade" role="dialog">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              <div class="modal-body text-center">
                                                                <h5><?= $row['judul']; ?></h5>
                                                                <img src="./img/<?= $row['gambar']??"./img/5cm.jpg"; ?>" alt="buku" class="img-fluid mx-auto" style="width: 213px; height: 289px;">
                                                                <h6 class="mt-3 text-success">Stok buku : <?= $row['stok'] ?></h6>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                                                              </div>
                                                            </div>

                                                          </div>
                                                        </div>
                                                    <!-- /modal -->

                                                    <td><?= $row['jumlah_buku']; ?></td>

                                                    <td><?= $row['username']; ?><button class="mr-2 float-right" data-toggle="modal" data-target="#admin-pinjam2<?php echo $row['id_user'];?>" 
                                                        style=" border: none;
                                                                background: none;
                                                                cursor: pointer;
                                                                margin: 0;
                                                                padding: 0;">
                                                    <i class="fas fa-info-circle fa-1x text-success"></i></button>
                                                    </td>

                                                    <!-- modal -->
                                                        <div id="admin-pinjam2<?php echo $row['id_user'];?>" class="modal fade" role="dialog">
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
                                                    <td> 
                                                        <a href="?page=data-peminjaman&aksi=kembali&id=<?= $row["id_peminjaman"]; ?>" class="btn btn-info btn-block" onclick="return confirm('yakin?');" >Kembalikan</a>

                                                        <?php if ($telat <= 0): ?>
                                                        <a href="?page=data-peminjaman&aksi=perpanjang&id=<?= $row["id_peminjaman"];?>&telat=<?= $telat;?>&tgl=<?= $row["batas_kembali"];?>" onclick="return confirm('yakin?');" class="btn btn-danger btn-block">Perpanjang</a>
                                                        <?php endif ?>
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

 
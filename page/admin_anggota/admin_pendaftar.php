            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data pendaftar anggota eperpus</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $pendaftar = query("SELECT * FROM tb_users WHERE status = false");
                                            foreach ($pendaftar as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['alamat']; ?></td>
                                                    <td><?= $row['tgl_daftar'] ?></td>
                                                    <td> 
                                                        <a href="?page=data-pendaftar&aksi=terima&id=<?= $row["id_user"];?>" onclick="return confirm('Yakin?');" class="btn btn-primary btn-block">Terima</a>
                                                        <a href="?page=data-pendaftar&aksi=tolak&id=<?= $row["id_user"];?>" onclick="return confirm('Yakin?');" class="btn btn-danger btn-block">Tolak</a>
                                                    </td>
                                                </tr>

                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 
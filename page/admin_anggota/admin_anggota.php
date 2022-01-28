            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables anggota</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=data-anggota&aksi=tambah" class="btn btn-primary">Tambah akun anggota</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $anggota = query("SELECT * FROM tb_users WHERE level = 'anggota' AND status = true");
                                            foreach ($anggota as $row) :
                                            ?>

                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['alamat']; ?></td>
                                                    <td><?= $row['level'] ?></td>
                                                    <td> 
                                                        <a href="?page=data-anggota&aksi=ubah&id=<?= $row["id_user"]; ?>" class="btn btn-info btn-block" >Ubah</a>
                                                        <a href="?page=data-anggota&aksi=hapus&id=<?= $row["id_user"];?>" onclick="return confirm('yakin?');" class="btn btn-danger btn-block">Hapus</a>
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

 
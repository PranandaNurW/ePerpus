            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data buku eperpus</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=data-buku&aksi=tambah" class="btn btn-primary">Tambah buku</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Jumlah buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>

                                    <?php 
                                    $i = 1;
                                    $buku = query("SELECT * FROM tb_buku");
                                    foreach ($buku as $row) :
                                    ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['judul']; ?></td>
                                            <td><?= $row['pengarang']; ?></td>
                                            <td><?= $row['penerbit']; ?></td>
                                            <td><?= $row['jumlah_buku']; ?></td>
                                            <td> 
                                                <a href="?page=data-buku&aksi=ubah&id=<?= $row["id_buku"]; ?>" class="btn btn-info btn-block">Ubah</a>
                                                <a href="?page=data-buku&aksi=hapus&id=<?= $row["id_buku"];?>" onclick="return confirm('yakin?');" class="btn btn-danger btn-block">Hapus</a>
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

 
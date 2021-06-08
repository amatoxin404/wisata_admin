<?php
include('auth.php');
include('src/header.php');
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if(isset($_SESSION['status'])) {
                                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <!-- buttton tambah data -->
                        <div>
                        <h4>
                            <a href="add_wisata.php" class="btn btn-primary" > Tambah Data </a>
                        </h4>
                        </div>
                        <!-- Akhir buttton tambah data -->
                            
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tempat</th>
                                            <th>Lokasi</th>
                                            <th>Keterangan</th>
                                            <th>Harga</th>
                                            <th>Jam Oprasional</th>
                                            <th>Restoran</th>
                                            <th>Masjid</th>
                                            <th>Pom</th>
                                            <th>Penginapan</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include('dbcon.php');
                                        $ref_table = "data_wisata";
                                        $fetchdata = $database->getReference($ref_table)->getValue();

                                        if($fetchdata > 0) {
                                            $i=1;
                                            foreach($fetchdata as $key => $row) {
                                                ?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><?=$row['fnama'];?></td>
                                                        <td><?=$row['flokasi'];?></td>
                                                        <td><?=$row['fket'];?></td>
                                                        <td><?=$row['fharga'];?></td>
                                                        <td><?=$row['fjam'];?></td>
                                                        <td><?=$row['fresto'];?></td>
                                                        <td><?=$row['fmasjid'];?></td>
                                                        <td><?=$row['fpom'];?></td>
                                                        <td><?=$row['fhotel'];?></td>
                                                        <td><?=$row['fimg'];?></td>
                                                        <td class="row justify-content-center">
                                                            <button style="background-color: transparent;">
                                                                <a href="update_wisata.php?id=<?=$key;?>" class="col-lg-4">
                                                                <span class="actionCust"> <i class="far fa-edit"></i> </span></a>
                                                            </button>
                                                            <form action="function.php" method="POST">
                                                                <input type="hidden" name="hapus_id" value="<?=$key;?>">
                                                                <button style="background-color: transparent;" type="submit" name="hapus_wisata">
                                                                <a class="col-lg-4">
                                                                <span class="actionCust"> <i class="far fa-trash-alt"></i></span></a>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="?">NO Record </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>

<?php
include('src/footer.php');
?>
  
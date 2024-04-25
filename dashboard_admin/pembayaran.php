<?php 
    include '../php/proses.php';

    $query = "SELECT * FROM pembayaran WHERE status = 'pending'";
    $sql = mysqli_query($conn, $query);
    // $data_pembayaran = mysqli_fetch_assoc($sql);s
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/pembayaran.css">
</head>
<body>
    
    <div class="sidebar">
        <div class="brand">
            <font>UKK | RPL</font>
        </div>
        <div class="navigation">
            <font>dahsbaord</font>
            <div class="navigation-menu">
                <a href="home.php">home</a>
                <a href="data_siswa.php">data siswa</a>
                <a href="data_petugas.php">data petugas</a>
                <a href="pembayaran.php">pembayaran</a>
                <a href="histori.php">histori</a>
                <a href="../index.php">logout</a>
            </div>
        </div>
    </div>
    <section>
        <div class="header">
            <div class="tittle">
                <font>pembayaran spp</font>
            </div>
            <div class="tittle">
                <font>pembayaran</font>
            </div>
        </div>
        <main>
            <div class="content-head">
                <font>daftar pembayaran</font>
            </div>
            <!-- <div class="toogle">
                <div class="search-wrapper">
                    <form action="" method="POST" class="search">
                        <input type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                        <button type="submit" name="cari">Cari</button>
                    </form>
                </div>
            </div> -->
            <table border="0">
                <tr>
                    <th>nama siswa</th>
                    <th>kelas</th>
                    <th>jurusan</th>
                    <th>NISN</th>
                    <th>no spp</th>
                    <th>tgl bayar</th>
                    <th>recipt</th>
                    <th></th>
                </tr>
                <?php while($data_pembayaran = mysqli_fetch_assoc($sql)) { 
                    $recipt = $data_pembayaran['bukti_transfer'];
                    $src = '../img/'.$recipt;
                ?>
                <tr>
                    <td><?php echo $data_pembayaran['nama_siswa']; ?></td>
                    <td><?php echo $data_pembayaran['kelas']; ?></td>
                    <td><?php echo $data_pembayaran['jurusan']; ?></td>
                    <td><?php echo $data_pembayaran['nisn']; ?></td>
                    <td><?php echo $data_pembayaran['no_spp']; ?></td>
                    <td><?php echo $data_pembayaran['tanggal_bayar']; ?></td>
                    <td>
                        <a href="pembayaran.php?imgView=<?php echo $src?>"><img src="<?php echo $src?>" style="width: 25%;"></a>
                    </td>
                    <td>
                        <a href="../php/proses.php?konfirmasi=<?php echo $data_pembayaran['id_pembayaran'] ?>">konfirmasi</a> | <a href="../php/proses.php?tolak=<?php echo $data_pembayaran['id_pembayaran'] ?>">tolak</a>
                    </td>
                </tr>
                <?php } ?>
                <?php 
                    if (isset($_GET['imgView'])) { 
                    $src = $_GET['imgView'];
                ?>
                    <a href="pembayaran.php" class="recipt-popUp">
                        <img src="<?php echo $src ?>" style="width: 25%;" alt="" class="recipt-view">
                    </a>
                <?php 
                    } 
                ?>
            </table>
        </main>
    </section>
   
    <footer>

    </footer>

</body>
</html>
<?php 
    include '../php/proses.php';
    
    $query = "SELECT * FROM pembayaran WHERE status != 'pending'";
    $sql = mysqli_query($conn, $query);

    // $data_pembayaran = mysqli_fetch_assoc($sql);
    // var_dump($data_pembayaran);
    // die();

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/histori.css">
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
                <a href="data_siswa.php" hidden>data siswa</a>
                <a href="data_petugas.php" hidden>data petugas</a>
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
                <font>histori</font> 
            </div>
        </div>
        <main>
            <div class="content-head">
                <font>daftar histori pembayaran</font>
            </div>
            <div class="toogle">
                <div class="search-wrapper">
                    <form action="" method="POST" class="search">
                        <input type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                        <button type="submit" name="cari">Cari</button>
                    </form>
                </div>
            </div>
            <table border="0">
                <tr>
                    <th>nama siswa</th>
                    <th>kelas</th>
                    <th>jurusan</th>
                    <th>NISN</th>
                    <th>no spp</th>
                    <th>tgl bayar</th>
                    <th>recipt</th>
                    <th>status</th>
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
                        <a href="histori.php?imgView=<?php echo $src?>"><img src="<?php echo $src ?>" style="width: 20%;"></a>
                        
                    </td>
                    <td>
                        <a href="" class="status-<?php echo $data_pembayaran['status'] ?>"><?php echo $data_pembayaran['status'];?></a>
                    </td>
                </tr>
                <?php } ?>
                <?php 
                    if (isset($_GET['imgView'])) { 
                    $src = $_GET['imgView'];
                ?>
                    <a href="histori.php" class="recipt-popUp">
                        <img src="<?php echo $src ?>" style="width: 25%;" alt="" class="recipt-view">
                    </a>
                <?php 
                    } 
                ?>
        </main>
    </section>
   
    <footer>

    </footer>

</body>
</html>
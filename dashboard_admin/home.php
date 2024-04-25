<?php 
    include '../php/proses.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/home.css">
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
                <font>home</font>
            </div>
        </div>
        <main>
            <figure>
                <blockquote>
                  <p>Selamat Datang <?php echo $_SESSION['nama_admin'] ?></p>
                </blockquote> 
                <figcaption>
                    &mdash; Admin Web SPP <cite>Sekolah Permata Harapan</cite>
                </figcaption>
              </figure>
        </main>
    </section>
   
    <footer>
        
    </footer>

</body>
</html>
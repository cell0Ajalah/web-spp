<?php 
include '../php/koneksi.php';

    $query = "SELECT * FROM tb_siswa";
    $sql = mysqli_query($conn, $query);
    // $data_siswa = mysqli_fetch_assoc($sql);
    // var_dump($data_siswa);
    // die();

    if(isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_siswa WHERE 
                    nama_siswa LIKE '%$keyword%' OR
                    kelas LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword%' OR
                    nisn LIKE '%$keyword%' OR
                    no_spp LIKE '%$keyword%'";
        $sql = mysqli_query($conn, $query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petugas</title>
    <link rel="stylesheet" href="../css/data_siswa.css">
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
                <font>data siswa</font>
            </div>
        </div>
        <main>
            <div class="content-head">
                <font>daftar siswa tahun ajaran 2023 - 2024</font>
            </div>
            <div class="toogle">
                <div class="search-wrapper">
                    <form action="" method="POST" class="search">
                        <input type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                        <button type="submit" name="cari">Cari</button>
                    </form>
                </div>
                <a href="form_siswa.php?add" class="add-button">Tambah data</a>
            </div>
            <table border="0">
                <tr>
                    <th>nama siswa</th>
                    <th>kelas</th>
                    <th>jurusan</th>
                    <th>NISN</th>
                    <th>NO SPP</th>
                    <th></th>
                </tr>
                <?php while ($dataSiswa = mysqli_fetch_assoc($sql)) { ?>
                <tr>
                    <td><?php echo $dataSiswa['nama_siswa']; ?></td>
                    <td><?php echo $dataSiswa['kelas']; ?></td>
                    <td><?php echo $dataSiswa['jurusan']; ?></td>
                    <td><?php echo $dataSiswa['nisn']; ?></td>
                    <td><?php echo $dataSiswa['no_spp']; ?></td>
                    <td>
                        <a href="form_siswa.php?edit=<?php echo $dataSiswa['id_siswa']; ?>">edit</a> | 
                        <a href="../php/proses.php?hapusSiswa=<?php echo $dataSiswa['id_siswa'];?>" onclick="return confirm('hapus data siswa?')">hapus</a>
                    </td>  
                </tr>
                <?php } ?>
            </table>
        </main>
    </section>
   
    <footer>

    </footer>

</body>
</html>

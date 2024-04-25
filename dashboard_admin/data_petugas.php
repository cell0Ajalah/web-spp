<?php 
include '../php/koneksi.php';

    $query = "SELECT * FROM tb_admin WHERE role = 'petugas'";
    $sql = mysqli_query($conn, $query);
    // $data_petugas = mysqli_fetch_assoc($sql);
    // var_dump($data_petugas);
    // die();

    if(isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_admin WHERE 
                    nama LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    username LIKE '%$keyword%' OR
                    password LIKE '%$keyword%' AND role = 'petugas'";
        $sql = mysqli_query($conn, $query);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/data_petugas.css">
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
                <font>data petugas</font>
            </div>
        </div>
        <main>
        
            <div class="content-head">
                <font>daftar petugas tahun ajaran 2023 - 2024</font>
            </div>
            <div class="toogle">
                <div class="search-wrapper">
                    <form action="" method="POST" class="search">
                        <input type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                        <button type="submit" name="cari">Cari</button>
                    </form>
                </div>
                <a href="form_petugas.php" class="add-button">Tambah data</a>
            </div>
            <table border="0">
                <tr>
                    <th>nama petugas</th>
                    <th>email</th>
                    <th>username</th>
                    <th>password</th>
                    <th></th>
                </tr>
                <?php while ($data_petugas = mysqli_fetch_assoc($sql)) { ?>
                <tr>
                    <td><?php echo $data_petugas['nama'];?></td>
                    <td><?php echo $data_petugas['email'];?></td>   
                    <td><?php echo $data_petugas['username'];?></td>
                    <td><?php echo $data_petugas['password'];?></td>
                    <td>
                        <a href="form_petugas.php?edit=<?php echo $data_petugas['id'];?>">edit</a> | 
                        <a href="../php/proses.php?hapusPetugas=<?php echo $data_petugas['id'];?>" onclick="return confirm('hapus data petugas?')">hapus</a>
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
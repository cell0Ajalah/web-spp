<?php 
    include '../php/koneksi.php';

    $id_siswa = '';
    $nisn = rand(1000000000, 9999999999);
    $nama_siswa = '';
    $kelas = '';
    $jurusan = '';
    $no_spp = rand(1000, 9999);
    $role = 'siswa';
    $username = '';
    $password = '';
    
    if(isset($_GET['edit'])) {
        $id_siswa = ($_GET['edit']);

        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
        $sql = mysqli_query($conn, $query);
        $data_siswa = mysqli_fetch_assoc($sql);
        // var_dump($data_siswa);
        // die();

        $nisn = $data_siswa['nisn'];
        $nama_siswa = $data_siswa['nama_siswa'];
        $kelas = $data_siswa['kelas'];
        $jurusan = $data_siswa['jurusan'];
        $no_spp = $data_siswa['no_spp'];
        $username = $data_siswa['username'];
        $password = $data_siswa['password'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/tambah_pengguna.css">

    <style>

        .navigation-menu a:nth-child(2) {
            border-left: 5px solid #470e9d;
        }

        .navigation-menu a:not(a:nth-child(2)) {
            border: none;
        }

    </style>
</head>

<body>

    <div class="sidebar">
        <div class="brand">
            <font>UKK | RPL</font>
        </div>
        <div class="navigation">
            <font>dahsbaord</font>
            <div class="navigation-menu">
                <a href="home.php" onclick="return confirm('Cancel Update?')">home</a>
                <a href="data_siswa.php" onclick="return confirm('Cancel Update?')">data siswa</a>
                <a href="data_petugas.php" onclick="return confirm('Cancel Update?')" hidden>data petugas</a>
                <a href="pembayaran.php" onclick="return confirm('Cancel Update?')">pembayaran</a>
                <a href="histori.php" onclick="return confirm('Cancel Update?')">histori</a>
                <a href="../index.php" onclick="return confirm('Cancel Update?')">logout</a>
            </div>
        </div>
    </div>
    <section>
        <div class="header">
            <div class="tittle">
                <font>pembayaran SPP</font>
            </div>
            <div class="tittle">
                <font>data siswa</font>
            </div>
        </div>
        <main>
            <div class="content-head">
                <?php if (isset($_GET['edit'])) { ?><font>edit data siswa</font>
                <?php } else { ?><font>tambah data siswa</font><?php } ?>
            </div>
            <form method="POST" action="../php/proses.php">
                <input type="hidden" id="id_siswa" name="id_siswa" value="<?php echo $id_siswa ?>">
                <input type="hidden" id="role" name="role" value="<?php echo $role; ?>">
                <div class="form-section">
                    <div class="input-area">
                        <label for="nisn">nisn</label>
                        <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>">
                    </div>
                    <div class="input-area">
                        <label for="nama_siswa">nama siswa</label>
                        <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>">
                    </div>
                    <div class="input-area">
                        <label for="kelas">kelas</label>
                        <input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>">
                    </div>
                    <div class="input-area">
                        <label for="jurusan">jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>">
                    </div>
                    <div class="input-area">
                        <label for="no_spp">no spp</label>
                        <input type="text" id="no_spp" name="no_spp" value="<?php echo $no_spp; ?>">
                    </div>
                </div>
                <div class="form-section">
                    <div class="input-area">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="input-area">
                        <label for="password">password</label>
                        <input type="text" id="password" name="password" value="<?php echo $password; ?>">
                    </div>
                </div>
                <div class="form-action">
                    <?php if (isset($_GET['edit'])) { ?>
                    <button type="submit" onclick="return confirm('Pastikan input data sudah benar?')"  name="aksi" value="edit_siswa" class="add-button">perbarui</button>
                    <?php } else { ?>
                    <button type="submit" onclick="return confirm('Pastikan input data sudah benar?')"  name="aksi" value="tambah_siswa" class="add-button">add</button>
                    <?php } ?>
                    <button type="button" onclick="location.href='data_siswa.php'" class="cancel-button">batal</button>
                </div>
            </form>
        </main>
    </section>


    <script src="../js/imgPreview.js">
        
    </script>
</body>

</html>
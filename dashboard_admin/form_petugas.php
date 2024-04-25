<?php 
    include '../php/proses.php';

    $id = '';
    $nama_petugas = '';
    $email = '';
    $username = '';
    $password = '';
    $role = 'petugas';
    
    
    if(isset($_GET['edit'])) {
        $id = ($_GET['edit']);

        $query = "SELECT * FROM tb_admin WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);
        $data_admin = mysqli_fetch_assoc($sql);
        // var_dump($data_admin);
        // die();

        $nama_petugas = $data_admin['nama'];
        $email = $data_admin['email'];
        $username = $data_admin['username'];
        $password = $data_admin['password'];
        $role = $data_admin['role'];
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

        .navigation-menu a:nth-child(3) {
            border-left: 5px solid #470e9d;
        }

        .navigation-menu a:not(a:nth-child(3)) {
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
                <a href="data_petugas.php" onclick="return confirm('Cancel Update?')">data petugas</a>
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
                <font>data petugas</font>
            </div>
        </div>
        <main>
            <div class="content-head">
                <?php if (isset($_GET['edit'])) { ?><font>edit data petugas</font>
                <?php } else { ?><font>tambah data petugas</font><?php } ?>
            </div>
            <form method="POST" action="../php/proses.php">
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                <input type="hidden" id="role" name="role" value="<?php echo $role ?>">
                <div class="form-section">
                    <div class="input-area">
                        <label for="nama_petugas">nama petugas</label>
                        <input type="text" id="nama_petugas" name="nama_petugas"  value="<?php echo $nama_petugas ?>">
                    </div>
                    <div class="input-area">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="input-area">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" value="<?php echo $username ?>">
                    </div>
                    <div class="input-area">
                        <label for="password">password</label>
                        <input type="text" id="password" name="password" value="<?php echo $password ?>">
                    </div>
                </div>
                <div class="form-action">
                <?php if (isset($_GET['edit'])) { ?>
                    <button type="submit" onclick="return confirm('Pastikan input data sudah benar?')"  name="aksi" value="edit_petugas" class="add-button">perbarui</button>
                    <?php } else { ?>
                    <button type="submit" onclick="return confirm('Pastikan input data sudah benar?')"  name="aksi" value="tambah_petugas" class="add-button">add</button>
                    <?php } ?>
                    <button type="button" onclick="location.href='data_petugas.php'" class="cancel-button">batal</button>
                </div>
            </form>
        </main>
    </section>


    <script src="../js/imgPreview.js">
        
    </script>
</body>

</html>
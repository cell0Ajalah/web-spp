<?php 
    include 'php/koneksi.php';
    session_start();

    if(isset($_GET['destroySession'])) {
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pembayaran spp - login</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="header">
        <font>web pembayaran spp</font>
        <font>UKK jurusan RPL <br> Sekolah Permata harapan 2</font>
    </div>
    <form method="POST" action="php/proses.php">
        <div class="form-head">
            <font>sign in</font>
        </div>
        <div class="input-group">
            <div class="input-area">
                <label for="username">username</label>
                <input type="text" id="username" name="username" required autocomplete="on">
            </div>
            <div class="input-area">
                <label for="password">password</label>
                <input type="password" id="password" name="password" required autocomplete="on">
            </div>
        </div>
        <select id="user" name="user" class="user-select" required>
            <option disabled>--pilih user--</option>
            <option value="tb_admin">admin</option>
            <option value="tb_siswa" selected>siswa</option>
        </select>
        <button type="submit" name="login">login</button>
    </form>
    <?php if (isset($_SESSION['gagalLogin'])) { ?>
    <div class="alert">
        <strong>
            <?php echo $_SESSION['gagalLogin'];?>
        </strong>
    </div>
    <?php session_destroy(); } ?>
</body>

</html>
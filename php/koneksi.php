<?php
    $conn = mysqli_connect('localhost', 'root', '', 'spp_sekolah');
    if ($conn) {
        // echo '<center>koneksi berhasil</center>';
    }
    mysqli_select_db($conn, 'spp_sekolah');
?>
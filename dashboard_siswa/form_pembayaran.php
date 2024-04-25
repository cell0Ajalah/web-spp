<?php 
    include '../php/proses.php';
    include '../php/koneksi.php';


    $nama_siswa= $_SESSION['nama_siswa'];

    if (isset($_GET['bayar'])) {
        $query = "SELECT * FROM tb_siswa WHERE nama_siswa = '$nama_siswa'";
        $sql = mysqli_query($conn, $query);
        $data_siswa = mysqli_fetch_assoc($sql);

        $nisn= $data_siswa['nisn'];
        $nama = $data_siswa['nama_siswa'];
        $kelas = $data_siswa['kelas'];
        $jurusan = $data_siswa['jurusan'];
        $no_spp = $data_siswa['no_spp'];
        $todays_date = date('d-m-o');
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin - home</title>
    <link rel="stylesheet" href="../css/form_pembayaran.css">
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
                <a href="form_pembayaran.php?bayar">bayar spp</a>
                <a href="histori.php">histori</a>
                <a href="../index.php">logout</a>
            </div>
        </div>
    </div>
    <section>
        <div class="header">
            <div class="tittle">
                <font>pembayaran SPP</font>
            </div>
            <div class="tittle">
                <font>bayar SPP</font>
            </div>
        </div>
        <main>
            <div class="content-head">
                <font>form pembayaran SPP</font>
            </div>
            <form method="POST" action="../php/proses.php" enctype="multipart/form-data">
                <div class="form-section">
                    <div class="input-area">
                        <label for="nisn">nisn</label>
                        <input type="text" id="nisn" name="nisn" value="<?php echo $nisn?>" readonly>
                    </div>
                    <div class="input-area">
                        <label for="nama">nama siswa</label>
                        <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $nama?>" readonly>
                    </div>
                    <div class="input-area">
                        <label for="kelas">kelas</label>
                        <input type="text" id="kelas" name="kelas" value="<?php echo $kelas?>" readonly>
                    </div>
                    <div class="input-area">
                        <label for="jurusan">jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" value="<?php echo $jurusan?>" readonly>
                    </div>
                </div>
                <div class="form-section">
                    <div class="input-area">
                        <label for="tanggal">tanggal bayar</label>
                        <!-- <input type="text" id="tanggal" value="<//?php date('d, M, o'); ?>"readonly> -->
                        <input type="text" id="tgl_bayar" name="tgl_bayar" value="<?php echo $todays_date?>" readonly>
                    </div>
                    <div class="input-area">
                        <label for="no_spp">No. SPP</label>
                        <input type="text" id="no_spp" name="no_spp" value="<?php echo $no_spp?>" readonly>
                    </div>
                    <div class="input-area">
                        <label for="bulan_Spp">SPP Bulan</label>
                        <select name="bulan_spp" id="bulan_spp">
                            <option disabled>~pilih bulan spp~</option>
                            <option value="januari">januari</option>
                            <option value="februari">februari</option>
                            <option value=">maret">maret</option>
                            <option value="april">april</option>
                            <option value="mei">mei</option>
                            <option value="juni">juni</option>
                            <option value="juli">juli</option>
                            <option value="agustus">agustus</option>
                            <option value="september">september</option>
                            <option value=oktober">oktober</option>
                            <option value="novemeber">novemeber</option>
                            <option value="december">december</option>
                        </select>
                    </div>
                    <div class="input-area">
                        <label for="nominal">nominal</label>
                        <input type="number" id="nominal" name="nominal">
                    </div>
                </div>
                <div class="input-photo">
                    <font>Bukti transfer</font>
                    <label for="recipt" class="select-image">upload recipt</label>
                    <input type="file" name="recipt" id="recipt">
                    <div class="preview-area">
                        
                    </div>
                </div>  
                <div class="form-action">
                    <button type="submit" onclick="return confirm('Pastikan input data sudah benar?')"  name="aksi"  value ="bayar_spp" class="add-button">kirim</button>
                    <button type="button" onclick="location.href='histori.php'" class="cancel-button">batal</button>
                </div>
            </form>
        </main>
    </section>


    <script src="../js/imgPreview.js">
        
    </script>
</body>

</html>
<?php 
    include 'koneksi.php';
    session_start();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $_POST['user'];
        // echo ($username . ' | ' . $password . ' | ' . $user);
        // die();

        $query = " SELECT * FROM $user WHERE username = '$username' AND PASSWORD = '$password'";
        $sql = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($sql); 
        // var_dump($data);
        // die();

        if ($data > 0) {
            $nama_admin = $data['nama'];
            $nama_siswa = $data['nama_siswa'];

            
            if ($data['role'] == 'admin') {
                header('location: ../dashboard_admin/home.php');
                $_SESSION['nama_admin'] = $nama_admin;
            } elseif ($data['role'] == 'petugas') {
                header('location: ../dashboard_petugas/home.php');
                $_SESSION['nama_admin'] = $nama_admin;
            } elseif ($data['role'] == 'siswa') {
                header('location: ../dashboard_siswa/home.php');
                $_SESSION['nama_siswa'] = $nama_siswa;
            } elseif ($data['role'] == 'siswa') {
                header('location: ../dashboard_siswa/form_pembayaran.php');
                $_SESSION['nama_siswa'] = $nama_siswa;
            } else { 
            header('location: ../index.php');
            $_SESSION['gagalLogin'] = 'username / password salah!!';
            }
        } else {
            header('location: ../index.php');
            $_SESSION['gagalLogin'] = 'user tidak ditemukan!!';
        }
    }

    if(isset($_POST['aksi'])) {
        //tambah data siswa
        if($_POST['aksi'] == 'tambah_siswa') { 

            $nama_siswa = $_POST['nama_siswa'];
            $kelas = $_POST['kelas']; 
            $jurusan = $_POST['jurusan'];
            $no_spp = $_POST['no_spp'];
            $nisn = $_POST['nisn'];
            $role = $_POST['role'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            // echo ($nisn . ' | ' . $nama_siswa . ' | ' . $kelas . ' | ' . $jurusan . ' | ' . $no_spp . ' | ' . $username . ' | ' . $password);
            // die();

            $query = "INSERT INTO tb_siswa VALUES(null, '$nama_siswa', '$kelas', '$jurusan', '$no_spp', '$nisn', '$role', '$username', '$password')";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header('location: ../dashboard_admin/data_siswa.php');
                $_SESSION['succesAlert'] = 'Data berhasil ditambahkan';
            } else {
                echo 'ERROR - Data gagal ditambah';
            }

        //edit data siswa
        } elseif ($_POST['aksi'] == 'edit_siswa') {

            $id_siswa = $_POST['id_siswa'];
            $nama_siswa = $_POST['nama_siswa'];
            $kelas = $_POST['kelas'];
            $jurusan = $_POST['jurusan'];
            $no_spp = $_POST['no_spp'];
            $nisn = $_POST['nisn'];
            // $role = $_POST['role'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            // echo $id_siswa;
            // die();

            $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = $id_siswa;";
            $sqlShow = mysqli_query($conn, $queryShow);
            $data_siswa = mysqli_fetch_assoc($sqlShow);

            $query = " UPDATE tb_siswa SET nama_siswa='$nama_siswa', 
                                            kelas = '$kelas', 
                                            jurusan = '$jurusan', 
                                            no_spp = '$no_spp', 
                                            nisn = '$nisn', 
                                            username = '$username', 
                                            password = '$password' 
                        WHERE id_siswa = $id_siswa;";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header('location: ../dashboard_admin/data_siswa.php');
                $_SESSION['succesAlert'] = 'Data berhasil di edit';
            } else {
                echo 'ERROR - Data gagal di edit';
            }

        } elseif ($_POST['aksi'] == 'tambah_petugas') {

            $nama_petugas = $_POST['nama_petugas'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            // echo ($role . ' | ' . $nama_petugas . ' | ' . $email . ' | ' . $username . ' | ' . $password);
            // die();

            $query = "INSERT INTO tb_admin VALUES(null, '$nama_petugas', '$email', '$username', '$password', '$role')";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header('location: ../dashboard_admin/data_petugas.php');
                $_SESSION['succesAlert'] = 'Data berhasil ditambahkan';
            } else {
                echo 'ERROR - Data gagal ditambah';
            }
        } elseif ($_POST['aksi'] == 'edit_petugas') {

            $id = $_POST['id'];
            $nama_petugas = $_POST['nama_petugas'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            // $role = $_POST['role'];
            // echo $role;
            // die();

            $queryShow = "SELECT * FROM tb_admin WHERE id = $id;";
            $sqlShow = mysqli_query($conn, $queryShow);
            $data_petugas = mysqli_fetch_assoc($sqlShow);

            $query = " UPDATE tb_admin SET nama ='$nama_petugas', 
                                            email = '$email',
                                            username = '$username', 
                                            password = '$password' 
                        WHERE id = $id;";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header('location: ../dashboard_admin/data_petugas.php');
                $_SESSION['succesAlert'] = 'Data berhasil di edit';
            } else {
                echo 'ERROR - Data gagal di edit';
            }
        } elseif ($_POST['aksi'] == 'bayar_spp') {
            $nama_siswa = $_POST['nama_siswa'];
            $kelas = $_POST['kelas'];
            $jurusan = $_POST['jurusan'];
            $nisn = $_POST['nisn'];
            $no_spp = $_POST['no_spp'];
            $recipt = $_FILES['recipt']['name'];
            $tgl_bayar = $_POST['tgl_bayar'];
            $bulan_spp = $_POST['bulan_spp'];
            $nominal = $_POST['nominal'];
            $status = 'pending';

            // echo ($nama_siswa. ' | ' .$kelas. ' | ' .$jurusan. ' | ' . $nisn. ' | ' .$no_spp. ' | ' .$recipt. ' | ' .$tgl_bayar. ' | ' .$bulan_spp. ' | ' .$nominal);
            // die(); 
            
            $path = "../img/".$recipt;
            $tmp_file = $_FILES['recipt']['tmp_name'];
            move_uploaded_file($tmp_file, $path);

            $query = "INSERT INTO pembayaran VALUES(null, '$nama_siswa', '$kelas', '$jurusan', '$nisn', '$no_spp', '$recipt', '$tgl_bayar', '$bulan_spp', '$nominal', '$status')";
            $sql = mysqli_query($conn, $query);

            if($sql) {
                header('location: ../dashboard_siswa/histori.php');
                $_SESSION['succesAlert'] = 'Data berhasil ditambahkan';
            } else {
                echo 'ERROR - Data gagal ditambah';
            }
        }
    }

    // if (isset($_GET['imgView'])) {
    //     header('location: ../dashboard_admin/histori.php');
    //     $_SESSION['imgView'] = " ";
    // } elseif (isset($_GET['imgView'])) {
    //     header('location: ../dashboard_petugas/histori.php');
    //     $_SESSION['imgView'] = " ";
    // } elseif (isset($_GET['imgView'])) {
    //     header('location: ../dashboard_siswa/histori.php');
    //     $_SESSION['imgView'] = "";
    // }

    //hapus data siswa
    if (isset($_GET['hapusSiswa'])) {
        $id_siswa = $_GET['hapusSiswa'];
       
        $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = $id_siswa;";
        $sqlShow = mysqli_query($conn, $queryShow);
        $data_siswa = mysqli_fetch_assoc($sqlShow);

        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header('location: ../dashboard_admin/data_siswa.php');
            $_SESSION['succesAlert'] = 'Data berhasil di dihapus';
        } else {
            echo 'ERROR - Data gagal dihapus';
        }
        
    } elseif (isset($_GET['hapusPetugas'])) {
        $id = $_GET['hapusPetugas'];
       
        $queryShow = "SELECT * FROM tb_admin WHERE id = $id;";
        $sqlShow = mysqli_query($conn, $queryShow);
        $data_siswa = mysqli_fetch_assoc($sqlShow);

        $query = "DELETE FROM tb_admin WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header('location: ../dashboard_admin/data_petugas.php');
            $_SESSION['succesAlertDelete'] = 'Data berhasil di dihapus';
        } else {
            echo 'ERROR - Data gagal dihapus';
        }
    }

    if (isset($_GET['konfirmasi'])) {
        $id_pembayaran = $_GET['konfirmasi'];

        $queryShow = "SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran;";
        $sqlShow = mysqli_query($conn, $queryShow);
        $data_pembayaran= mysqli_fetch_assoc($sqlShow);

        
        $query = " UPDATE pembayaran SET status = 'succes' WHERE id_pembayaran = $id_pembayaran;";
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header('location: ../dashboard_admin/histori.php');
            $_SESSION['succesAlert'] = 'pembayaran dikonfirmasi';
        } elseif ($sql) {
            header('location: ../dashboard_petugas/histori.php');
            $_SESSION['succesAlert'] = 'pembayaran dikonfirmasi';
        } else {
            echo 'ERROR - Data gagal di edit';
        }
    } elseif (isset($_GET['tolak'])) {
        $id_pembayaran = $_GET['tolak'];

        $queryShow = "SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran;";
        $sqlShow = mysqli_query($conn, $queryShow);
        $data_pembayaran= mysqli_fetch_assoc($sqlShow);

        
        $query = " UPDATE pembayaran SET status = 'rejected' WHERE id_pembayaran = $id_pembayaran;";
        $sql = mysqli_query($conn, $query);

        if($sql) {
            header('location: ../dashboard_admin/histori.php');
            $_SESSION['succesAlert'] = 'pembayaran ditolak';
        } elseif ($sql) {
            header('location: ../dashboard_petugas/histori.php');
            $_SESSION['succesAlert'] = 'pembayaran ditolak';
        } else {
            echo 'ERROR';
        }
    }
?>
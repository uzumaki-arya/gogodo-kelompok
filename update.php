<?php 
    include 'koneksi.php';

    $id = $_GET['id'];
    $siswa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM siswa WHERE id=$id"));

    if(isset($_POST['update']))
    {
        $nama= $_POST['nama'];
        $foto_lama = $siswa['foto'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];

        if($_FILES['foto']['name']!="") {
            $nama_file = $_FILES['foto']['name'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            $path = "upload/" . $nama_file;

            if(move_uploaded_file($tmp_file, $path)){
                if(file_exists("upload/" . $foto_lama)&& $foto_lama!=""){
                    unlink("upload/" . $foto_lama);
                }
                $foto = $nama_file;
            } else {
                $foto = $foto_lama;
            }
        } else {
            $foto = $foto_lama;
        }
    }

    mysqli_query($conn, "UPDATE siswa
    SET nama='$nama', foto='$foto', kelas='$kelas', jurusan='$jurusan', email='$email', no_hp='$no_hp'
    WHERE id=$id");
?>
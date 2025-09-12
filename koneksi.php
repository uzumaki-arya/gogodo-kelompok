<?php 
    $host = 'localhost';
    $admin = 'root';
    $pass = '';
    $db = 'data_siswaa';

    $conn = mysqli_connect($host, $admin, $pass, $db);
    if (!$koneksi){
        die('Koneksi gagal: ' . mysqli_connect_error());
    }
?>
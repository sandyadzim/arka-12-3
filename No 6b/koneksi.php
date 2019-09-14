<?php

	$server = "localhost";
    $user = "root";
    $pass = "";
    $database ="arka_karyawan";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die("Koneksi Gagal");

    function rupiah($nilai = 0){
        $string = "Rp," . number_format($nilai);
        return $string;
    }

?>
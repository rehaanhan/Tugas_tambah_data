<?php

/*
    Nama   : Teguh Tri Laksono
    NIM    : 210102054
    Kelas  : IF21
*/

require 'function.php';

$id = $_GET["id"];
    if(delete($id) > 0) {
        echo "<script> 
        alert('data berhasil di hapus'); 
        document.location.href = 'indeks.php';
        </script>";
    }else {
        echo "<script> 
        alert('data gagal di hapus'); 
        document.location.href = 'indeks.php'; 
        </script>";
    }

?>


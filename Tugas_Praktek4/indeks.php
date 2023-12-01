<?php
require 'function.php';

//mengambil data dan diurutkan ascending
$data_mhs = query("SELECT * FROM data_mhs ORDER BY nidn ASC");

//mengecek button submit ditekan
if (isset($_POST["cari"]) ) {
    $data_mhs = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- 
    Nama   : Teguh Tri Laksono
    NIM    : 210102054
    Kelas  : IF21
-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="img/data.png">
    <title> Daftar Data Mahasiswa </title>
</head>
    
<body>
    <table class="upper">
	<tr><td> <h1>DataMU Mahasiswa</h1> <br>
	sistem informasi mahasiswa UMBandung </td>
	</tr>
</table>

<h1> Daftar Data Mahasiswa </h1>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr> <td colspan="7">
            <!-- form searching data-->
            <form action="" method="post" align="center">
            <input type="text" name="keyword" size="50"
                placeholder="Masukkan kata kunci pencarian" autocomplete="off">
                <button type="submit" name="cari"> Cari </button>
            </form><br>
        </td></tr>
        <tr> 
            <th> No. </th>
            <th> Aksi</th>
            <th> Foto</th>
            <th> Nama</th>
            <th> NIDN</th>
            <th> Email</th>
            <th> Prodi</th>
        </tr>

        <!-- looping-start-->
        <?php $i=1; ?>
        <?php foreach ($data_mhs as $row) :?>
            
        <tr>
            <td> <?php echo $i; ?> </td>
            <td>
                 <!--edit_data-->
                <a href="edit_data.php ?id=<?= $row["id"]; ?> "><b> edit </b></a>
                 <!--delete_data-->
                <a href="delete_data.php ?id=<?= $row["id"]; ?>"
                onclick="return confirm('Anda ingin menghapus data ini?');"><b style="color:red";> delete </b></a></p>
            </td>
            <td> <img src="img/<?php echo $row ["foto"]; ?>" width="50" height="60"> </td>
            <td> <?= $row ["nama"]; ?> </td>
            <td> <?= $row ["nidn"]; ?> </td>
            <td> <?= $row ["email"]; ?> </td>
            <td> <?= $row ["prodi"]; ?> </td>
        </tr>

        <!-- looping-end-->
        <?php $i++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="7"> <a href="add_data.php" align="center"> <img src="img/plus.png" height="24" width="24"><b> Add Data MHS  </b> 
        </a> </td>
        </tr>
    </table>

    <p align="center"><a href="indeks.php"><b> Beranda </b></a> </p><br><br>

</body>
</html>
<?php
require 'function.php';

$id = $_GET["id"];
$mhs = query("SELECT*FROM data_mhs WHERE id =$id")[0];
//var_dump($mhs);

if(isset($_POST["submit"])) {
    if(edit($_POST) > 0) {
        echo "<script> 
        alert ('data berhasil diubah'); 
        document.location.href = 'indeks.php'; 
        </script>";
    }else {
        echo "<script> 
        alert ('data gagal diubah'); 
        document.location.href = 'indeks.php'; 
        </script>";
    }
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
    <link rel="shortcut icon" href="img/favicon.png">
    <title> Edit Data MHS</title> 
</head>
    
<body>
<table class="upper">
	<tr><td> <h1>DataMU Mahasiswa</h1> <br>
	sistem informasi mahasiswa UMBandung </td>
	</tr>
</table>

<table class="daftar" border="1" align="center">
	<tr>
		<td><h1> Edit Data Mahasiswa </h1>

        <table width="500" border="0" cellpadding="10" cellspacing="0">
        <form action ="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>" >

        <tr><td><label for="NIDN"> NIDN : </label> </td>
				<td><input type="text" name="nidn" id="NIDN" size="30" maxlength="30" required value="<?= $mhs["nidn"]; ?>"> 
			</td></tr>

			<tr><td><label for="nama"> Nama : </label> </td>
				<td><input type="text" name="nama" id="nama" size="30" maxlength="30" required value="<?= $mhs["nama"]; ?>">
			</td></tr>
			
			<tr><td><label for="email"> Email : </label> </td> 
				<td><input type="text" name="email" id="email" size="30" maxlength="30" required value="<?= $mhs["email"]; ?>">
			</td></tr>
			
			<tr><td> <label for="prodi"> Program Studi : </label> </td>
			<td><select name="prodi" id="prodi" required value="<?= $mhs["prodi"]; ?>">
				<option>Teknik Informatika</option>
				<option>Teknik Elektro</option>
				<option>Bioteknologi</option>
				<option>Agribisnis</option>
				<option>Teknik Industri</option>
			</select><br><br>
			</td></tr>
			
			<tr><td> <label for="foto"> Foto : </label> </td>
				<td> <input type="file" name="foto" id="foto" value="<?= $mhs["foto"]; ?>">
			<br><br>
			</td></tr>
			
            <tr> <tr>
			<td></td>
			<td align="right">
            <button type="submit" name="submit"> Submit </button>
            </td></tr>
			<tr><td></td></tr>
			</table> <br>

			</table>
	</form>
	</td></tr>
</table>

    <br>
    <p align="center"><a href="indeks.php"><b> Beranda </b></a> </p><br><br>

</body>
</html>
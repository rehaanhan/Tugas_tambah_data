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
    <title>Connect </title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr>
            <td> Connecting to Database </td>
        </tr>
        <tr>
            <td> 
            <!-- koneksi php ke mySQL -->
                <?php
                $servername = "localhost";
                $username   = "root";
                $password   = "";
                $database   = "tugas_praktek4";

            //Buat koneksi
                $conn = mysqli_connect ($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die ("Koneksi gagal : " . $conn->connect_error);
                }
                    
                echo "PHP -> MySQL <br>";
                echo "Koneksi Berhasil";

                $conn->close();
                ?>
            </td>
        </tr>
    </table>
    <a href="indeks.php"> Beranda </a>
</body>
<html>

<?php
/* 
    Nama   : Teguh Tri Laksono
    NIM    : 210102054
    Kelas  : IF21
*/

//koneksi ke db
$conn = mysqli_connect ("localhost", "root","","tugas_praktek4");

function query ($query) {
    global $conn; 
    $result = mysqli_query ($conn,$query);
    $rows = []; 
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row; 
    }
    return $rows;
}

//fungsi add_data
function add ($data) {
    global $conn;
    $nama = $data["nama"];
    $nidn = $data["nidn"];
    $email = $data["email"];
    $prodi = $data["prodi"];
    
    //upload foto
    //$foto  = $_POST['foto'];
    $foto = upload();

    if(!$foto) {        //tidak ada file foto = gagal
        return false;
        
    }

    //query insert data
    $query = "INSERT INTO data_mhs VALUES ('','$nama','$nidn','$email','$prodi','$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); 
}

//fungsi upload
function upload() {

        $filename   = $_FILES ['foto']['name'];
        $filesize   = $_FILES ['foto']['size'];
        $error      = $_FILES ['foto']['error'];
        $tmpName    = $_FILES ['foto']['tmp_name'];

        //mengecek ada-tidak gambar yg diupload
        if($error === 4) {
            echo "<script>
            alert ('Upload gambar terlebih dahulu!');
            </script>";

            return false;
        }

        //mengecek yg diupload gambar/bukan
        $fileExtensionValid = ['jpg','jpeg','png'];
        $fileExtension      = explode ('.' , $filename);
        $fileExtension      = strtolower(end($fileExtension));

        if(!in_array($fileExtension, $fileExtensionValid)){
            echo "<script>
            alert ('yang anda upload bukan gambar');
            </script>";
            var_dump($fileExtension);

            return false;
        }

        //mengecek size foto yang diupload
        if($filesize > 500000) {    //0,5mb
            echo "<script>
            alert ('ukuran gambar terlalu besar');
            </script>";
            //var_dump($filesize);

            return false;
        }

        //generate nama file foto
        $newFileName    = uniqid();
        $newFileName    .= '.';
        $newFileName    .= $fileExtension;
        //var_dump($newFileName); die;

        //lolos pengecekan, gambar siap diupload
        move_uploaded_file($tmpName, 'img/' .$newFileName);
        return $newFileName;
}

//fungsi delete_data (fix)
function delete($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_mhs WHERE id=$id");
    return mysqli_affected_rows($conn);
}

//fungsi edit_data
function edit($data) {
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $nidn = $data["nidn"];
    $email = $data["email"];
    $prodi = $data["prodi"];
    $foto = upload();

    if(!$foto) {        //tidak ada file foto = gagal
        return false;
        
    }
    
    //query insert data
    $query = "UPDATE data_mhs SET
    nama='$nama',nidn='$nidn',email='$email',prodi='$prodi',foto='$foto'
    WHERE id=$id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi searching (fix)
function cari ($keyword) {
    $query = "SELECT * FROM data_mhs WHERE 
    nama LIKE '%$keyword%' OR 
    prodi LIKE '%$keyword%' OR 
    nidn LIKE '%$keyword%' ";

    return query($query);
}

?>
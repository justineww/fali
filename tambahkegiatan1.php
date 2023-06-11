<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "calender";

$conn = mysqli_connect($servername, $username, $password, $database) or die("Koneksi Gagal");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tambahkegiatan1.php" method="POST">
        Nama Kegiatan : <input type="text" name="namaKegiatan" max="50" required><br>
        Tanggal Mulai : <input type="date" name="tanggalMulai" required><br>
        Tanggal Selesai : <input type="date" name="tanggalSelesai" required><br>
        Notes Tambahan : <br> <textarea name="note" id="note" cols="30" rows="10"></textarea> <br> 
        Pilih Prioritas Kegiatan : <br>
        <select name="prioritas" required>
            <option value="prioritasRendah">Prioritas Rendah</option>
            <option value="prioritasSedang">Prioritas Sedang</option>
            <option value="prioritasTinggi">Prioritas Tinggi</option>
        </select><br>
        <input type="submit" name="submit">   
    </form>
    <?php
    if($_POST){
        $namaKegiatan = $_POST["namaKegiatan"]; 
        $tanggalMulai = $_POST["tanggalMulai"];
        $tanggalSelesai = $_POST["tanggalSelesai"];
        $note = $_POST["note"];
        $prioritas = $_POST["prioritas"];
        $sql = "INSERT INTO penampung_kegiatan (namaKegiatan,tanggalMulai,tanggalSelesai,note,prioritas) values ('".$namaKegiatan."','".$tanggalMulai."','".$tanggalSelesai."','".$note."','".$prioritas."')";
        if(mysqli_query($conn,$sql)){
            echo "Data berhasil ditambahkan";
            header("Location: tambahkegiatan.html");
        }else{
            echo "Data gagal ditambahkan";
    }   
}
mysqli_close($conn);
?>
</body>
</html>
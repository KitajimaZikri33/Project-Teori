<!DOCTYPE html>
<html>
<head>
    <title>Tiket Bioskop</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_jadwal=input($_POST["id_jadwal"]);
        $hari=input($_POST["hari"]);
        $jam=input($_POST["jam"]);
        $harga=input($_POST["harga"]);
        $id_film=input($_POST["id_film"]);
        $id_teater=input($_POST["id_teater"]);
        

        //Query input menginput data kedalam tabel anggota
        $sql="insert into jadwal (id_jadwal,hari,jam,harga,id_film,id_teater) values
		('$id_jadwal','$hari','$jam','$harga','$id_film','$id_teater')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:jadwal.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID Jadwal:</label>
            <input type="text" name="id_jadwal" class="form-control" placeholder="Masukan ID Jadwal" required/>
        </div>
        <div class="form-group">
            <label>Hari:</label>
            <input type="text" name="hari" class="form-control" placeholder="Masukan Hari" required />

        </div>
        <div class="form-group">
            <label>Jam:</label>
            <input type="text" name="jam" class="form-control" placeholder="Masukan Jam" required/>

        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="Harga" class="form-control" placeholder="Masukan Harga" required/>

        </div>
        <div class="form-group">
            <label>ID Film:</label>
            <input type="text" name="id_film" class="form-control" placeholder="Masukan ID Film" required/>
        </div>
        <div class="form-group">
            <label>ID Teater:</label>
            <input type="text" name="id_teater" class="form-control" placeholder="Masukan ID Teater" required/>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
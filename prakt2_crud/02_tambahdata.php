<!Doctype html>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.jpg">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

     <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <div class="container" align="center">
    <h2 align="center" >Form Tambah Data</h2>
        <form>
            <h4>Nama : <input type="text" name="nm"> </h4>
            <input type="submit" class="btn btn-primary" name="sub" value="Simpan Data Baru">
            <input type="submit" class="btn btn-danger" name="sub" value="Kembali ke Tampil Data">
            <?php
                if (isset($_GET['sub'])) { //mengecek udah ditekan atau belum
                if ($_GET['sub']=="Kembali ke Tampil Data"){
                        header("location:01_tampildata.php");
                    }
                else{
                        if (strlen($_GET['nm'])) { //strlen mengukur panjang string || Tujuannya mengecek data kosong atau tidak
                            include "koneksi.php";
                            mysqli_query($kon,"INSERT INTO `mahasiswa` (`id`, `nama`)
                                            VALUES (NULL, '".$_GET['nm']."')");
                            echo "<br>Data <b>".$_GET['nm']."</b> Telah Disimpan di Database";
                        }
                        else
                            echo "<br>Data Nama Tidak Boleh Kosong";
                }	
                }
            ?>
        </form>
    </div>
</html>
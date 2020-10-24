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

    <body>
        <div class="container" align="center">
            <?php
                if ($_GET['aksi']=="Edit"){
                    echo "<h2>Form Edit</h2>";
                    ?>
                    <form>
                        <input type="text" name="nm" value="<?php echo $_GET['nm'] ?>">
                        <input type="submit" class="btn btn-info" name="sub" value="Simpan Perubahan">
                        <input type="submit" class="btn btn-danger" name="sub" value="Kembali ke Tampil Data">
                        <input type="hidden" name="aksi" value="Edit">
                        <input type="hidden" name="idupdate" value="<?php 
                        if (isset($_GET['idupdate']))
                            echo $_GET['idupdate']; 
                        else
                            echo $_GET['id'];
                    ?>">
                        
                    </form>	
                    <?php
                    if (isset($_GET['sub'])){
                        if ($_GET['sub']=="Kembali ke Tampil Data"){
                            header("location:01_tampildata.php");
                        }
                        else {
                            if (strlen($_GET['nm'])){
                                if (strlen($_GET['nm'])){
                                    include "koneksi.php";
                                    mysqli_query($kon,"UPDATE `mahasiswa` SET `nama` = '".$_GET['nm']."' WHERE `mahasiswa`.`id` = ".$_GET['idupdate']);
                                    echo "<br>Nama Baru ".$_GET['nm']." Telah Disimpan";
                                }
                            }
                        }
                    }
                }

                else {
                    echo "<h2>Konfirmasi Penghapusan Data</h2>";
                    ?>
                    <form>
                        Anda yakin akan menghapus data <b><?php echo $_GET['nm']; ?></b>?
                        <input type="submit" name="sub" value="iya">
                        <input type="submit" name="sub" value="tidak">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <input type="hidden" name="aksi" value="<?php echo "Delete"; ?>">
                        <input type="hidden" name="nm" value="<?php echo $_GET['nm']; ?>">
                    <?php
                    if (isset($_GET['sub'])){
                    if($_GET['sub']=="tidak"){
                        header("location:01_tampildata.php");
                        }
                    else{
                        include "koneksi.php";
                        mysqli_query($kon,"DELETE FROM `mahasiswa` WHERE `id` = ".$_GET['id']);
                        header("location:01_tampildata.php");
                    }
                    }
                }
            ?>
        </div>
    </body>
</html>
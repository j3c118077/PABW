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
    <a href="../" role="button">Kembali</a>
<h2>Data Mahasiswa</h2>


<form action="02_tambahdata.php">
    <input type="submit" value="Tambah Data Baru"> 
</form>
<br>
</html>

<?php
    include "koneksi.php";
    $r=mysqli_query($kon,"SELECT * FROM mahasiswa");
    $i=1;
    while($brs=mysqli_fetch_assoc($r)) {
        //print_r($brs);
        echo "<form action=\"03_aksi.php\">";
        echo $i++.". ". $brs["nama"];
        echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Edit\">";
        echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Delete\">";
        echo "<p>";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$brs["id"]."\">";
        echo "<input type=\"hidden\" name=\"nm\" value=\"".$brs["nama"]."\">";
        echo "</form>";
    }
?>

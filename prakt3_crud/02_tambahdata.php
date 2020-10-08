<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <a  href="01_tampildata.php" role="button">Kembali</a>
    <title>Tambah Data</title>
  </head>
  <body class="mx-4">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Data Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="01_tampildata.php">Tampil Data</a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="#">Tambah Data <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<form enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Masukkan NIM</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nim">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Masukkan Nama</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nama">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Masukkan Jenis Kelamin</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jeniskelamin" id="exampleRadios1" value="Laki-laki">
        <label class="form-check-label" for="exampleRadios1">
            Laki-laki
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jeniskelamin" id="exampleRadios2" value="Perempuan">
        <label class="form-check-label" for="exampleRadios2">
            Perempuan
        </label>
    </div>
  </div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
      <option value="Islam">Islam</option>
      <option value="Protestan">Protestan</option>
      <option value="Katolik">Katolik</option>
      <option value="Hindu">Hindu</option>
      <option value="Buddha" >Buddha</option>
      <option value="Konghucu">Konghucu</option>
    </select>
</div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Olahraga Favorit</label>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="Sepak Bola" id="defaultCheck1" name="olahraga[]">
  <label class="form-check-label" for="defaultCheck1">
    Sepak Bola
  </label>
  </div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Basket" id="defaultCheck2" name="olahraga[]">
  <label class="form-check-label" for="defaultCheck2">
    Basket
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Futsal" id="defaultCheck3" name="olahraga[]">
  <label class="form-check-label" for="defaultCheck3">
    Futsal
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Renang" id="defaultCheck4" name="olahraga[]">
  <label class="form-check-label" for="defaultCheck4">
    Renang
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Badminton" id="defaultCheck5" name="olahraga[]">
  <label class="form-check-label" for="defaultCheck5">
    Badminton
  </label>
</div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Masukkan Foto Anda</label>
    <input type="file" name="foto">
  </div>

<button type="submit" class="btn btn-primary" name="submit">Simpan Data Baru</button>
</form>
	<?php
    if (isset($_POST['submit'])) { //mengecek udah ditekan atau belum
            if (!isset($_POST['nim'])) {
                echo "<br>Data NIM Tidak Boleh Kosong";
            }
            elseif (!isset($_POST['nama'])) {
                echo "<br>Data Nama Tidak Boleh Kosong";
            }
            elseif (!isset($_POST['jeniskelamin'])) {
                echo "<br>Data Jenis Kelamin Tidak Boleh Kosong";
            }
            elseif (!isset($_POST['agama'])) {
                echo "<br>Data Agama Tidak Boleh Kosong";
            }
            elseif (!isset($_POST['olahraga'])) {
                echo "<br>Data Olahraga Favorit Tidak Boleh Kosong";
            }
            elseif (!isset($_FILES['foto'])) {
                echo "<br>Foto Tidak Boleh Kosong";
            }
            elseif ($_FILES['foto']['type'] == "image/jpg" || $_FILES['foto']['type'] == "image/png" ) {
                echo "<br>Upload Foto berformat jpg/png";
            }
            else { 
                include "koneksi.php";
                $olahragafav = implode(", ", $_POST['olahraga']);
                move_uploaded_file($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
                mysqli_query($kon,"INSERT INTO`mahasiswa` (`id`, `nim`, `nama`, `jeniskelamin`, `agama`, `olahraga`,`foto`)
                               VALUES (NULL, '".$_POST['nim']."', '".$_POST['nama']."', '".$_POST['jeniskelamin']."', '".$_POST['agama']."', '".$olahragafav."', '".$_FILES['foto']['name']."' )" 
                            );
                #echo "<br>Data <b>".$_POST['nama']."</b> Telah Disimpan di Database";   
                
                
            }
        
    }
        else {
            echo "<marquee>Silahkan isi data anda</marquee>";
        }
		
	?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
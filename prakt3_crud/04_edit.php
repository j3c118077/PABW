<?php
        if (isset($_POST['submit'])) { //mengecek udah ditekan atau belum

                if (!isset($_POST['nim'])) {
                    echo "<br>NIM Tidak Boleh Kosong";
                }
                elseif (!isset($_POST['nama'])) {
                    echo "<br>Data Nama Tidak Boleh Kosong";
                    echo "<a href='01_tampildata.php'>Kembali ke tampil data</a>";
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
                else { 
                    include "koneksi.php";
                    $olahragafav = implode(", ", $_POST['olahraga']);
                   
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `nim` = '".$_POST['nim']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `nama` = '".$_POST['nama']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `jeniskelamin` = '".$_POST['jeniskelamin']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `agama` = '".$_POST['agama']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `olahraga` = '".$olahragafav."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    if(empty($_FILES['foto']['name'])){
                        $fotonya = $_POST['fotolama'];
                    }
                    else {
                        move_uploaded_file($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
                        $fotonya = $_FILES['foto']['name'];
                    }
                    mysqli_query($kon,"UPDATE `mahasiswa` SET `foto` = '".$fotonya."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
                    echo "<br>Data <b>".$_POST['nama']."</b> Telah Disimpan di Database";   
                    header("location:01_tampildata.php");
                }
            
        }
        else {
            header("location:01_tampildata.php");
        }
	?>       
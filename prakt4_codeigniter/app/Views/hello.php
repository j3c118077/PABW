<form action="<?php echo site_url('Mahasiswa/ucapan'); ?>" method="get"> <!--bisa ganti method post-->
    <input type="text" name="nama">
    <input type="submit" name="kirim" value="kirim">
</form>
Hello, Selamat malam <b><?php echo $n?> </b>

<?php
    echo date("d-m-Y")."<br>";
    echo base_url()."<br>";
    echo site_url()."<br>" ;
    echo site_url('Mahasiswa/ucapan');
    

?>
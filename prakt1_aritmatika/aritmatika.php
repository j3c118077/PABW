<a class="btn btn-primary" href="../" role="button">Kembali</a>
<form action="aritmatika.php" method="GET">
    <input type="number" name="bil1" 
    <?php
        if(isset($_GET['bil1']))
            echo 'value="'.$_GET['bil1'].'"';
    ?>
    />
    <select name="opr">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="x">x</option>
    </select>
    <input type="number" name="bil2"
    <?php
        if(isset($_GET['bil2']))
            echo 'value="'.$_GET['bil2'].'"';
    ?>
    />
    <input type="submit" value="=" name="sub"/>
    <?php
        if (isset($_GET['sub']) && strlen($_GET['bil1']) && strlen($_GET['bil2'])){
            switch($_GET['opr']){
                case '+': $hsl = $_GET['bil1'] + $_GET['bil2']; break;
                case '-': $hsl = $_GET['bil1'] - $_GET['bil2']; break;
                case '/': $hsl = $_GET['bil1'] / $_GET['bil2']; break;
                case 'x': $hsl = $_GET['bil1'] * $_GET['bil2']; break;
            }
            echo $hsl;
            $logkita = $_GET['history']. $_GET['bil1']." ". $_GET['opr']. " ". $_GET['bil2']." = ".$hsl. "<br />";
        }
    ?>
    <input type="hidden" name="history" 
    <?php
        if (isset($_GET['sub']) && strlen($_GET['bil1']) && strlen($_GET['bil2']))
            echo 'value="'.$logkita.'"';
        else
            echo 'value=""';
    ?> 
    />
   
    <h2> Low Perhitungan Sebelumnya: </h2>
    <?php
       if (isset($_GET['sub']) && strlen($_GET['bil1']) && strlen($_GET['bil2']))
        echo $logkita;
    ?>
    <input type="submit" value="reset log" name="reset"/>


    
   
</form>
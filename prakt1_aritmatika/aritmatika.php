<!DOCTYPE html>
<html>
    <head>
        <title>Aritmatika</title><br>
        
        <!-- menyisipkan bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        


    <div class="container-fluid">
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
            <input type="submit" class="btn  btn-danger" value="reset log" name="reset"/>
            <a class="btn btn-primary" href="../" role="button">Kembali</a>
        </form>
     </div>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
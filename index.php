<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona logowania</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once "polaczenie.php";
        if(isset($_POST['login'])){
            $polaczenie=new mysqli($host,$uzytkownik,$haslo,$nazwaBazy);
            if($polaczenie->connect_errno!=0){
                echo "Błąd połączenia z bazą: ".$polaczenie->connect_errno." Opis błędu: ".$polaczenie->connect_error;
            }else{
                $sql="SELECT * FROM danelogowania";
                $wynik=mysqli_query($polaczenie,$sql);
                while($wiersz=mysqli_fetch_array($wynik) ){
                    $imie[]=$wiersz['imie'];
                    $nazwisko[]=$wiersz['nazwisko'];
                }

            }
        }else{
            echo "Podaj dane do logowania";
        }
        
    ?>

    <header class="naglowek"><h1>Drużyna TOP Fortnite 4TIE</h1></header>
    <nav>
        <form method="post" action="#">
        <?php
            if(isset($_SESSION['user'])){
                echo "ustawiona sesja użytkownika";
            }else{
                echo "<label>Login:</label><input type='login' name='login'><label>Hasło:</label><input type='password' name='haslo'><input type='submit' value='Zaloguj się'>";
            }
        ?>
        </form>
    </nav>
    <aside>
        <h2>Menu boczne</h2>
    </aside>
    <section class="prawy">
        <output id="wynikLogowania">
         <ul>
            <?php
            for($i=0;$i<count($imie);$i++){
                echo "<li>$imie[$i] $nazwisko[$i]</li>";
            }
            ?>
            </ul>
        </output>
    </section>
    <footer>
        <h3>Stronę przygotował Przemek</h3>
    </footer>

    
</body>
</html>
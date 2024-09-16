<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body class="main">
    <header>
        <h2>Światowe Rozgrywki Piłkarskie</h2>  
        <img src="obraz1.jpg" alt="boisko"></img>
    </header>
    <table id="games">
        <tr>
            <?php
                $conn = mysqli_connect("localhost","root","","egzamin");
                $sql = "SELECT zespol1,zespol2,wynik,data_rozgrywki from rozgrywka where zespol1 = 'EVG'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo"<td class='gra_c'><div class= 'gra'>";
                    echo "<h3>".$row['zespol1']." - ".$row['zespol2']."</h3>";
                    echo "<h4>".$row['wynik']."</h4>";
                    echo "<p>w dniu ".$row['data_rozgrywki']."</p>";
                    echo "</div></td>";
                }
            ?>
        </tr>
    </table>
    <div id="main">
        <h2>Reprezentacja Polski</h2>
    </div>
    <div id="right">
        <img src="zad1.png" alt="pikarz" height="150px" height="auto"></img>
        <p>Autor: 00000000</p>
    </div>
    <div id="left">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 
        4-napastnicy):</p>
        <form method="post">
            <input min="1" name="numer" type="number">
            <input type="submit" value="Sprawdź">
        </form>
        <?php   
            if(isset($_POST["numer"])){
                $num = $_POST["numer"];
                $sql = "SELECT imie, nazwisko from zawodnik where pozycja_id = $num";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<ul>";
                    echo "<li>".$row["imie"]." ".$row["nazwisko"]."</li>";
                    echo "</ul>";
                }
            }
            ?>
    </div>
<?php 
mysqli_close($conn);
?>
</body>
</html>
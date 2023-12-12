<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styl2.css" />
    <title>Wawrzyniak</title>
  </head>
  <body>
    <header>
    <section class="baner" id="lewy">
      <h1>Internetowy sklep z eko-warzywami</h1>
    </section>
    <section class="baner" id="prawy">
      <ol>
        <li>warzywa</li>
        <li>owoce</li>
        <li><a href="https://terapiasokami.pl/" target="blank">soki</a></li>
      </ol>
    </section>
    </header>
    <main>
      <?php 
      $sql = mysqli_connect("localhost","root","","dane2");
      $nazwa = $_POST["nazwa"];
      $cena = $_POST["cena"];
      $zap2 = "INSERT INTO produkty(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (1,4,'".$nazwa."',10,'',".$cena.",'owoce.jpg')";
      $zapytanko = mysqli_query($sql,$zap2);
      mysqli_close($sql);
      ?>
      <?php 
      $sql = mysqli_connect("localhost","root","","dane2");
      $zap1 = "SELECT produkty.nazwa,produkty.ilosc, produkty.opis, produkty.cena, produkty.zdjecie FROM produkty WHERE produkty.Rodzaje_id = 1 OR produkty.Rodzaje_id = 2";
      
      $zapytanko = mysqli_query($sql,$zap1);
      foreach ($zapytanko as $wynik){
        echo '<div class="owocki">';
        echo "<img src='".$wynik['zdjecie']."' alt='warzywniak'>";
        echo "<h5>".$wynik['nazwa']."</h5>";
        echo "<p> opis: ".$wynik["opis"]."<p>";
        echo "<p> na stanie: ".$wynik["ilosc"]."</p>";
        echo "<h2>".$wynik["cena"]." zł</h2>";
        echo "</div>";
      }
      
      
      
      mysqli_close($sql);
        ?>
    </main>
    <footer>
      <form action="#" method="POST">
        <label for="nazwa">Nazwa:</label>
        <input type="text" name="nazwa" id="nazwa"/>
        <label for="cena">Cena:</label>
        <input type="text" name="cena" id="cena"/>
        <button type="submit">Dodaj produkt</button>
      </form>
      <p>Strone wykonał: 12345678910</p>
    </footer>
  </body>
</html>

<?php
session_start();

if (!isset($_SESSION['sunt_logat'])) {
    $_SESSION['sunt_logat'] = false; // Implicit utilizatorul nu este logat
}

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Acasa
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
	  <link rel="stylesheet" href="../Fisiere CSS/style-index.css">
	  <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';

echo '

<div class="header"
    <br><br><br><br>
    <h1 style="font-size: 4em; text-decoration: overline; text-decoration-color: red;">POIANA BUCATELOR<h1>
	<h1>- RESTAURANT CU SPECIFIC TRADIȚIONAL ROMÂNESC -</h1>
</div>';

echo '
<br><br>
<div class="container">
    <div class="left">
        <img src="../Images/restaurant.jpg" alt="Restaurant" />
    </div>
    <div class="right">
        <p>Descoperiți farmecul unui restaurant în care bucătăria tradițională se îmbină armonios
		 cu rețete moderne, create pentru a încânta toate gusturile.</p>

		<p>La Poiana Bucatelor, oferim preparate inspirate din tradițiile românești, dar și
		opțiuni culinare contemporane, pregătite cu pasiune și ingrediente de cea mai bună calitate.</p>
    </div>
</div>


<br><br><br><br><hr><br><br>
<div class="imagine-container">
    <div class="imagine">
        <div class="titlu-imagine">Poiana Bucatelor Catering</div>
        <img src="../Images/catering2.jpg" alt="Imagine 1">
        <div class="text-sub-imagine">
            <p>Oferim servicii de catering pentru diverse evenimente ocazionale. Asigurăm livrarea la orice
			locație din oraș și județ în cele mai bune condiții.</p>
        </div>
    </div>
    <div class="imagine">
        <div class="titlu-imagine">Meniul zilei</div>
        <img src="../Images/meniu1.jpg" alt="Imagine 2">
        <div class="text-sub-imagine">
            <p>În fiecare zi de Luni până Vineri pregatim cu drag pentru clienții noștrii un meniu al zilei diferit
			 care include două feluri de mâncare și desert.</p>
        </div>
    </div>
</div>

<br><hr><br><br><br><br><br><br>';

include 'footer.php';

echo '
</body>
</html>';

?>
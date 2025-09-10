<?php
session_start();

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Catering
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-catering.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';

echo '

<div class="main">
    <br><br><br><br><br>
    
    <div class="imagine-container">
        <img src="../Images/catering2.jpg" alt="Imagine catering" class="imagine-larga">
        <div class="text-peste-imagine">POIANA BUCATELOR CATERING</div>
    </div>

    <br><br><br><br><hr>
</div>

<br><br>

<div class="container">
        <div class="col coloana1">
            <img src="../Images/catering3.jpg" alt="Imagine 1">
            <img src="../Images/catering1.jpg" alt="Imagine 2">
            <img src="../Images/catering6.jpg" alt="Imagine 3">
        </div>
        <div class="col coloana2">
            <h3>Catering</h3>
            <p>Oferim servicii de catering și livrări la domiciliu pentru diverse evenimente ocazionale.</p>

            <br><br>

            <h3>Meniu diversificat</h3>
            <p>Dispunem de un meniu diversificat de gustări calde și reci pregătit cu dăruire. Meniul este 
            făcut după rețete delicioase și tradiționale.</p>

            <br>
            <h3>Platouri</h3>
            <p>Pregătim platouri cu gustări calde și reci și asigurăm livrarea acestora pentru diferite
            conferințe și evenimente.</p>
            

        </div>
        <div class="col coloana3">
            <h3>Bufet Suedez</h3>
            <p>Bufet Suedez cu preparate reci sau calde. Aperitive tradiționale și internaționale.</p>
            
            <br>
            <h3>Livrări</h3>
            <p>Asigurăm livrări oriunde în județul Prahova. În Municipiul Câmpina și în împrejurimi
            livrarea preparatelor este gratuită. </p>
            
            <br>
            <h3>Comenzi</h3>
            <p>Preluăm comenzi în intervale extinse de timp, de Luni până Vineri între 10:00 - 22:00. 
            Comenzile se fac cu cel puțin 48 de ore înainte de data și ora livrării.</p>
        </div>
</div>


<br><br><br><br><br>';

include 'footer.php';

echo '

</body>
</html>';
?>
<?php
session_start();

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Despre noi
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-contact.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-meniu.css">
      <link rel="stylesheet" href="../Fisiere CSS/style-footer.css">
	 
	</head>';

echo ' <body> ';

include 'meniu-navigare.php';

echo '

<div class="main">
    <br><br><br><br><br>
    
    <div class="imagine-container">
        <img src="../Images/terasa3.jpeg" alt="Descriere imagine" class="imagine-larga">
        <div class="text-peste-imagine">CONTACT</div>
    </div>
    <p>Descoperă gustul autentic al mâncărurilor tradiționale românești!</p>
    <hr>
</div>

<br><br>


<div class="contact-container">
    <div class="contact-left">
        <div class="contact-item">
            <h2>ADRESA</h2>
            <p>Poiana Bucatelor</p>
            <p>Bulevardul Carol I, Municipiul Câmpina</p>
        </div>
        <div class="contact-item">
            <h2>PROGRAM</h2>
            <p>LUNI - VINERI 10:00 - 22.00</p>
            <p>SÂMBĂTĂ ÎNCHIS</p>
            <p>DUMINICĂ 11:00 - 23:00</p>
        </div>
        <div class="contact-item">
            <h2>ADRESĂ E-MAIL</h2>
            <p>poianabucatelor@yahoo.com</p>
        </div>
        <div class="contact-item">
            <h2>TELEFON</h2>
            <p>Comenzi și Rezervări</p>
            <p>0747 232 569</p>
            <p>Sesizări / Solicitări speciale</p>
            <p>0749 074 998</p>
        </div>
    </div>

    <div class="contact-right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5630.352829494962!2d25.73765488329047!3d45.12276075994096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b3007e06e471ab%3A0x8d24be2ca6c16a32!2s105600%20C%C3%A2mpina!5e0!3m2!1sro!2sro!4v1736012363788!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
</div>

<br><br>
<div class="urare">
    <h1>Vă așteptăm cu drag!</h1>
</div>

<br>

';

include 'footer.php';

echo '

</body>
</html>';
?>
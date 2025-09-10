<?php

echo '
    <ul class="meniu-navigare">
        <li><a class="buton_meniu" href="index.php"><b>ACASĂ</b></a></li>
        <li><a class="buton_meniu" href="meniu-mancare.php"><b>MENIU</b></a></li>
        <li><a class="buton_meniu" href="catering.php"><b>CATERING</b></a></li>';
        if ($_SESSION['sunt_logat']) {
            echo '<li><a class="buton_meniu" href="vezi-rezervari.php"><b>REZERVĂRI</b></a></li>';
            echo '<li><a class="buton_meniu" href="vezi-recenzii.php"><b>RECENZII</b></a></li>';
        }
        
        echo '<li><a class="buton_meniu" href="contact.php"><b>CONTACT</b></a></li>';

if (!$_SESSION['sunt_logat']) {
    echo '<li><a class="buton_meniu" href="login.php"><b>AUTENTIFICARE</b></a></li>';
}
else
{
    echo '<li><a class="buton_meniu" href="logout.php" onclick="return confirm(\'Sigur doriți să vă deconectați?\')"><b>DECONECTARE</b></a></li>';
}
        
echo '</ul>';


?>
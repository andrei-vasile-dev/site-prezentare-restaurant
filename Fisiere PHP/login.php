<?php
session_start();
include 'conectarebd.php';

echo '
	<!DOCTYPE html>
	<html>
	<head>
	  <title>
	      Login
	  </title>
	  <link rel="stylesheet" href="../Fisiere CSS/style-login.css">
	 
	</head>';

echo ' <body>';
echo '<br><br>';
echo ' <a href="index.php" class="myButton">INAPOI LA SITE</a>';

echo '<div class="login-container">';
echo '  <h1>Autentificare</h1>';

if (!isset($_POST["username"]))
{
	echo '
	<form action="login.php" method="post">
		<table>
			<tr>
				<td><label for="username">Username:</label></td>
			</tr>
			<tr>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td><label for="parola">Parola:</label></td>
			</tr>
			<tr>
				<td><input type="password" id="parola" name="parola"></td>
			</tr>
			<tr>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>
	</form>';

    echo '  <p class="no-account"> Nu ai cont?</p>';
    echo '  <p class="create-account"><a href="register.php">Creează cont nou</a></p>';
}   
    else 
{
	// citesc userul si parola trimise din formular
	$username = trim($_POST["username"]);
    $parola = trim($_POST["parola"]);


    if (empty($username) || empty($parola)) {
        echo '<p style="color: red;">Toate câmpurile sunt obligatorii!</p>';
        echo '<br>';
        echo ' <a href="login.php" class="reincearca">ÎNCEARCĂ DIN NOU</a>';
        echo '<br><br>';

        die();
    }
	
	// citesc userul si parola din baza de date
	$sql = 'SELECT * FROM utilizatori WHERE username = "'.$username.'"';
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
		    while($row = mysqli_fetch_array($result)){
		        $username_bd = $row['username'];
				$parola_bd = $row['parola'];
				$id_bd = $row['id_utilizator'];
				$admin = $row['admin'];
		    }
		    mysqli_free_result($result);
		} else{
		    echo '<p style="color: red;">Username sau parola inclorecte!</p>';
            echo '<br>';
            echo ' <a href="login.php" class="reincearca">ÎNCEARCĂ DIN NOU</a>';
            echo '<br><br>';

		    die();
		}
	} else{
		echo 'ERROR: Nu s-a putut executa $sql. ' . mysqli_error($link);

        die();
	}
	
	// compar parola din baza de date cu parola completata in formular
	if ($parola == $parola_bd  && $admin =='nu') {
		$_SESSION['id_utilizator'] = $id_bd;
		echo "Logarea s-a efectuat cu succes!<br><br><br>" ;
        $_SESSION['sunt_logat'] = true;
		echo ' <a href="index.php" class="buton-acasa">ACASA</a><br><br>';
		die();
	}
    elseif($parola == $parola_bd  && $admin == 'da')
	{
		$_SESSION['id_utilizator'] = $id_bd;
		echo "V-ați logat ca si administrator!<br><br><br>" ;
        $_SESSION['sunt_logat'] = true;
		echo ' <a href="../Admin/meniu-mancare-admin.php" class="buton-acasa">ADMINISTREAZĂ SITE</a><br><br>';
		die();

	}
    {
        echo '<p style="color: red;">Username sau parola inclorecte!</p>';
        echo '<br>';
        echo ' <a href="login.php" class="reincearca">ÎNCEARCĂ DIN NOU</a>';
        echo '<br><br>';
        die();
    }

}

echo '</div>';

echo '</body>';
echo '</html>';


?>
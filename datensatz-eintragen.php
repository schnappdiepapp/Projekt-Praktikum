<!DOCTYPE html>
<html lang="de">

<head>
<meta charset="UTF-8">

<title>Neuen Datensatz eintragen</title>


<?php

if(isset($_POST["neuenDatensatzEintragen"])){

    // Verbindung zur Datenbank 
    $host_name = 'localhost';
    $user_name = 'root';
    $password = '';
    $database = 'terminplaner';
    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    mysqli_query($connect, "SET NAMES 'utf8'");

    // Neue Eingaben in Variablen abspeichern
    $kundeID = $_POST["idEintragen"];
    $vorname = $_POST["vornameEintragen"];
    $nachname = $_POST["nachnameEintragen"];
    $email = $_POST["emailEintragen"];
	$mobil = $_POST["handyEintragen"];
	$datum = $_POST["datumEintragen"];
	$uhrzeit = $_POST["uhrzeitEintragen"];
	$minuten = $_POST["minutenEintragen"];
	$preis = $_POST["preisEintragen"];
	$anzahl = $_POST["anzahlEintragen"];

    // neuer Eintrag als SQL-String für tbl_kunde
    $neuerEintrag = "INSERT INTO tbl_kunde(KundeID, Vorname, Nachname, Email, Handy, Datum, Uhrzeit, Minuten, Preis, Anzahl)
	VALUES ('$kundeID','$vorname', '$nachname','$email','$mobil', '$datum', '$uhrzeit', '$minuten', '$preis',  '$anzahl');";

    // SQL-Anweisung durchführen
    $check = mysqli_query($connect, $neuerEintrag);

    if($check) {
        echo "Der Datensatz wurde hinzugefügt!";
    }
}

?>


</head>

<body>
	<style>
		
		body {		
			font-family: 'Saira Semi Condensed', sans-serif; 
			background: black;
			color: white;
		}
		
		.submits{
			width: 230px;
			height: 25px;
			font-size: 12pt;
			color: black;
			background-color: #f73e3e; 
			text-align: center;
			text-decoration: none;
			display: inline-block;
			transition-duration: 0.4s;
			cursor: pointer;
			border-radius: 5px;
			margin-bottom: 10px;
			margin-top: 10px;
			border: 1px solid white;
		}
		.submits:hover {  
			font-weight: bold;
			outline: none !important;
			border-color: #F73E3E;
			box-shadow: 0 0 10px #F73E3E;
		}
		
		input[type="text"]:focus {
			outline: none !important;
			border-color: #F73E3E;
			box-shadow: 0 0 10px #F73E3E;
		}
				
		a {
			color: #f73e3e;
		}
		
	</style>


<h1>Neuen Datensatz eintragen</h1>

<form action="datensatz-eintragen.php" method="post">

    <p><input type="text" name="idEintragen"> Kunden-ID eintragen</p>
    <p><input type="text" name="vornameEintragen"> Vorname</p>
    <p><input type="text" name="nachnameEintragen"> Nachname</p>
    <p><input type="text" name="emailEintragen"> Email</p>
	<p><input type="text" name="handyEintragen"> Handy</p>
	<p><input type="text" name="datumEintragen"> Datum (JJJJ-MM-TT)</p>
	<p><input type="text" name="uhrzeitEintragen"> Uhrzeit (hh:mm)</p>
	<p><input type="text" name="minutenEintragen"> Minuten</p>
	<p><input type="text" name="preisEintragen"> Preis</p>
	<p><input type="text" name="anzahlEintragen"> Anzahl Anwendungen</p>
    <p><input type="submit" class="submits" name="neuenDatensatzEintragen" value="Datensatz eintragen"> 
	<input type="reset" class="submits"></p>

</form>

<a href="BeauthiDatenverwaltung.php">Zurück zur Datenverwaltung-Übersicht</a>

</body>
</html>
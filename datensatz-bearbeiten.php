<!DOCTYPE html>
<html lang="de">
<head>

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

<h1>Datensatz bearbeiten</h1>

<?php

// Verbindung zur Datenbank
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$database = 'terminplaner';
$connect = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_query($connect, "SET NAMES 'utf8'");


// Auswahl des Radiobuttons aus Datenverwaltung
if(isset($_POST["auswahl"])){

    // Datenbankabfrage
    $kundeID = $_POST["auswahl"];
    $abfrage = "SELECT * FROM tbl_kunde WHERE KundeID = $kundeID";
    $result = mysqli_query($connect, $abfrage);

    // Datensatz in Variablen abspeichern
    $datensatz = mysqli_fetch_assoc($result);
    $kundeID = $datensatz["KundeID"];
    $vorname = $datensatz["Vorname"];
    $nachname = $datensatz["Nachname"];
    $email = $datensatz["Email"];
	$handy = $datensatz["Handy"];
	$datum = $datensatz["Datum"];
	$uhrzeit = $datensatz["Uhrzeit"];
	$minuten = $datensatz["Minuten"];
	$preis = $datensatz["Preis"];
	$anzahl = $datensatz["Anzahl"];

    // Formular zum Bearbeiten
    echo "<form action='datensatz-bearbeiten.php' method='post'>";
    echo "<p><input type='text' name='KundeID'  type='hidden' value='$kundeID'> Kunden-ID</p>";
	echo "<p><input type='text' name='Vorname' value='$vorname'> Vorname</p>";
    echo "<p><input type='text' name='Nachname' value='$nachname'> Nachname</p>";
    echo "<p><input type='text' name='Email' value='$email'> Email</p>";
    echo "<p><input type='text' name='Handy' value='$handy'> Handy</p>";
	echo "<p><input type='text' name='Datum' value='$datum'> Datum (JJJJ-MM-TT)</p>";
	echo "<p><input type='text' name='Uhrzeit' value='$uhrzeit'> Uhrzeit (hh:mm)</p>";
	echo "<p><input type='text' name='Minuten' value='$minuten'> Minuten</p>";
	echo "<p><input type='text' name='Preis' value='$preis'> Preis</p>";
	echo "<p><input type='text' name='Anzahl' value='$anzahl'> Anzahl Anwendungen</p>";
	
	
    echo "<input class='submits' name='dsatzBearbeiten' value='Datensatz bearbeiten' type='submit'>";
    echo "</form>";

    echo "<a href='BeauthiDatenverwaltung.php'><P>zurück zur Datenverwaltung-Übersicht</p></a>";
}

// Datensatz aktualisieren mit UPDATE
if(isset($_POST["dsatzBearbeiten"])){
	$kundeID = $_POST["KundeID"];
    $vorname = $_POST["Vorname"];
    $nachname = $_POST["Nachname"];
    $email = $_POST["Email"];
	$handy = $_POST["Handy"];
	$datum = $_POST["Datum"];
	$uhrzeit = $_POST["Uhrzeit"];
	$minuten = $_POST["Minuten"];
	$preis = $_POST["Preis"];
	$anzahl = $_POST["Anzahl"];

	// UPDATE SQL-String für tbl_kunde
	$update = "UPDATE tbl_kunde SET
	KundeID ='$kundeID',
	Vorname ='$vorname',
	Nachname ='$nachname',
	Email ='$email',
	Handy ='$handy',
	Datum ='$datum',
	Uhrzeit ='$uhrzeit',
	Minuten ='$minuten',
	Preis ='$preis',
	Anzahl ='$anzahl'
	WHERE KundeID = $kundeID";

	// SQL-Anweisung durchführen
    mysqli_query($connect, $update);
	echo "<p>Datensatz bearbeitet.<br>";
    echo "<a href='BeauthiDatenverwaltung.php'><p>zurück zur Datenverwaltung-Übersicht</a>";
}

// Wenn in BeauthiDatenverwaltung.php keine Auswahl getroffen wurde:
if(!isset($_POST["auswahl"]) && !isset($_POST["dsatzBearbeiten"])){
    echo "Kein Datensatz ausgewählt!<br>";
    echo "<a href='BeauthiDatenverwaltung.php'><p>zurück zur Datenverwaltung-Übersicht</a>";
}

?>

</body>
</html>
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
		
		a {
			color: #f73e3e;
		}
	</style>

<?php

// Verbindung zur Datenbank
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$database = 'terminplaner';
$connect = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_query($connect, "SET NAMES 'utf8'");


for($i=1; $i <= 1000000; $i++){
	
    // auswahl$i wird verglichen mit der Übertragung von auswahl$kundeID aus der checkbox in der Datenverwaltung
	if(isset($_POST["auswahl$i"])){

		$loeschen = "DELETE FROM tbl_kunde WHERE KundeID = $i";
		$result = mysqli_query($connect, $loeschen);
		echo "Datensatz mit der Kunden-ID $i gelöscht!<br>";
		
	}

}

?>

<a href="BeauthiDatenverwaltung.php"><p>Zurück zur Datenverwaltung-Übersicht</p></a>

</body>

</html>
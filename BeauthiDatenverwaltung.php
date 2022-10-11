
<?php
 // Verbindung zur Datenbank "Terminplaner"
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$database = 'terminplaner';
$connect = mysqli_connect($host_name, $user_name, $password, $database);

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />    
    <h1>Datenverwaltung</h1>
  </head>
	<body>
		<style>
		
		body {		
			font-family: 'Saira Semi Condensed', sans-serif; 
			background: black;
			color: white;
		}
		
		fieldset {  
			
			display: block;
			border: 2px outset #f73e3e;
		}
		
		.submits { 
			width: 150px;
			height: 30px;
			color: black;
			background-color: #f73e3e; 
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14pt;
			transition-duration: 0.4s;
			cursor: pointer;
			border-radius: 5px;
			margin-bottom: 10px;
			margin-top: 10px;
			border: 1px solid white;
		}

		#submit1, #submit2, #submit3{
			width: 230px;
			height: 25px;
			font-size: 12pt;
			
		}
		.submits:hover {  
			font-weight: bold;
			outline: none !important;
			border-color: #F73E3E;
			box-shadow: 0 0 10px #F73E3E;
		}
		
		th {
			height: 35px;
			color: white;
		}
		
		table {
			width: 70%;
			border-collapse: collapse;
			border: 2px solid white;
		}
		
	
	</style>
	
		<form action="" method="post">
		<fieldset>
			<input type="radio" id="datenanzeigen" name="AuswahlStart" value="DatenAnzeigen">
			<label for="datenanzeigen">Datensätze anzeigen</label><br>
			<input type="radio" id="ausloggen" name="AuswahlStart" value="Ausloggen">
			<label for="ausloggen">Ausloggen (Dummy)</label><p>
			<input type="submit" name="Bestaetigen1" class="submits"  value="Bestätigen">

		<?php

		// SQL-Ausgabe als String von tbl_kunde
		$abfrage = "SELECT * FROM tbl_kunde";

		// SQL-Ausgabe ausführen und anzeigen
		$result = mysqli_query($connect, $abfrage);

		// Wenn Submit ausgeführt
		if (isset($_POST['Bestaetigen1'])) {   
			
			if (isset($_POST['AuswahlStart'])) { 

				$answer = $_POST['AuswahlStart'];

				if ($answer == "DatenAnzeigen") {
					  
					echo "<table border='1'>
						<tr>
						<th>bearbeiten</th>
						<th>löschen</th>
						<th>KundeID</th>
						<th>Vorname</th>
						<th>Nachname</th>
						<th>Email</th>
						<th>Handy</th>
						<th>Datum</th>
						<th>Uhrzeit</th>
						<th>Minuten</th>
						<th>Preis</th>
						<th>Anzahl</th>
						</tr>";

					// mysqli_fetch_assoc -> damit kann man sich Datensätze in einem assoziativem (verknüpfendem) Array übergeben lassen -> Feldnamen innerhalb der Tabelle werden als Schlüssel benutzt.
					while($datensatz = mysqli_fetch_assoc($result)){ 
						echo "<tr>";
						$kundeID = $datensatz["KundeID"];

						echo "<td><input type='radio' name='auswahl' value='$kundeID'></td>" .
							 "<td><input type='checkbox' name='auswahl$kundeID' value='$kundeID'></td>" .
							"<td>" . $datensatz["KundeID"] . "</td>" . 
							"<td>" . $datensatz["Vorname"] . "</td>" . 
							"<td>" . $datensatz["Nachname"] . "</td>" . 
							"<td>" . $datensatz["Email"] . "</td>" . 
							"<td>" . $datensatz["Handy"] . "</td>" . 
							"<td>" . $datensatz["Datum"] . "</td>" . 
							"<td>" . $datensatz["Uhrzeit"] . "</td>" . 
							"<td>" . $datensatz["Minuten"] . "</td>" . 
							"<td>" . $datensatz["Preis"] . "</td>" . 
							"<td>" . $datensatz["Anzahl"].  
							"</tr>";
					}

					echo "</table>";

					?>
					<!-- Das Eingabeformular: -->
					<h2>Auswahl:</h2>

					<p>
					<input type="submit" class="submits" name="neuerDatensatz" id="submit1" formaction="datensatz-eintragen.php" value="neuen Datensatz eintragen">
					</p>
					<p>
					<input type="submit" class="submits" name="datensatzBearbeiten" id="submit2" formaction="datensatz-bearbeiten.php" value="Datensatz bearbeiten">
					</p>
					<p>
					<input type="submit" class="submits" name="DatensatzLoeschen" id="submit3" formaction="datensatz-loeschen.php" value="Datensätze löschen">
					</p>

					<?php
				}

				else if ($answer == "Ausloggen"){
							   echo "Ausloggen";
						   }
			}
		}

		?>
		</fieldset>
		</form>
	</body>
</html>
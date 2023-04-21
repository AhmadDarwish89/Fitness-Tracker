
<?php

include("connect.php");
include("headervorlage.php");
	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

	$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);

	if($row)
	{
		$row = $row[0];
	}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesundheitsinfos hinzufügen</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
<div class="text-center p-1"><a href="index.php">ZURUCK</a></div>
	

		<div class="col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
			
			<div class="h2">Gesundheitsinfos hinzufügen</div>
			<form class="form" method="post" >
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
			  <input name="datum" id="datum" required type="date" class="form-control p-3" placeholder="Datum:" >
			</div>
			<div><small class="js-error js-error-firstname text-danger"></small></div>
			


	<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-body-text"></i></span>
			  <input name="Koerpergroeße"  id="Koerpergroeße" required type="number" class="form-control p-3" placeholder="Koerpergroeße:"  >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			
			
	<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi bi-body-text"></i></span>
			  <input name="Gewicht"  id="Gewicht" required type="number" class="form-control p-3" placeholder="Gewicht:" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
		
		
						  
	<div class="input-group mt-3">
	<span class="input-group-text" id="basic-addon1"><i class="bi bi-calculator-fill"></i></span>

	<input type="number" name="result" id="result" readonly>
	<label for="result">--BMI--</label>



			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			
			
		
				<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge-fill"></i></span>
			  <input name="Lebensalter"  id="Lebensalter" required type="number" class="form-control p-3" placeholder="Lebensalter:" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
					
					<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-activity"></i></span>
			  <input name="Aktivitaet"  id="Aktivitaet" required type="text" class="form-control p-3" placeholder="Aktivitaet:" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			
				<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-arrow-counterclockwise"></i></span>
			  <input name="Dauer"  id="Dauer" required type="number" class="form-control p-3" placeholder="Dauer:" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
	
			  <select class="form-select" name="Mitarbeiter_ID" id="Mitarbeiter_ID">

				  <?php
					$sql1="select * from users WHERE users.id=$id";
					$query1=mysqli_query($verbindung,$sql1);
					while($ergebnis1=mysqli_fetch_assoc($query1))
					{
					$ma_id=$ergebnis1["id"];
					$firstname=$ergebnis1["firstname"];
					$lastname=$ergebnis1["lastname"];
				    echo "<option value='".$ma_id."'>".$firstname." ".$lastname."</option>";
					}
					?>
				
			
				   </select>
			</div>
<button class="mt-3 btn btn-primary col-12 "name="Hinzufügen">Hinzufügen</button>
	

		</div>
	</form>
	
</body>
</html>
<?php



if(isset($_POST['Hinzufügen'])) {
	$datum = mysqli_real_escape_string($verbindung, $_POST['datum']);

$Koerpergroeße = mysqli_real_escape_string($verbindung, $_POST['Koerpergroeße']);
$Gewicht = mysqli_real_escape_string($verbindung, $_POST['Gewicht']);
$Lebensalter = mysqli_real_escape_string($verbindung, $_POST['Lebensalter']);
$Aktivitaet = mysqli_real_escape_string($verbindung, $_POST['Aktivitaet']);
$Dauer = mysqli_real_escape_string($verbindung, $_POST['Dauer']);
$Mitarbeiter_ID = mysqli_real_escape_string($verbindung, $_POST['Mitarbeiter_ID']);
$BMI = mysqli_real_escape_string($verbindung, $_POST['result']);


// SQL-Statement vorbereiten und ausführen
$sql = "INSERT INTO gesundheitsinfos ( Koerpergroeße, Gewicht, Lebensalter, Aktivitaet, Dauer, Mitarbeiter_ID,datum, BMI)
		VALUES ('$Koerpergroeße', '$Gewicht', '$Lebensalter', '$Aktivitaet', '$Dauer', '$Mitarbeiter_ID', '$datum','$BMI')";
if (mysqli_query($verbindung, $sql)) {

	$message = "Gesundheitsinfos erfolgreich hinzugefügt";
echo "<script>alert('$message');</script>";

} else {
	die("Fehler: " . mysqli_error($verbindung));
}
}
// Datenbankverbindung schließen
mysqli_close($verbindung);
		  

	
?>

<script>
  // Abrufen der Referenzen auf die Eingabefelder
  const Koerpergroeße = document.getElementById('Koerpergroeße');
  const Gewicht = document.getElementById('Gewicht');
  const resultresult = document.getElementById('result');

  // Funktion zum Multiplizieren von Koerpergroeße und Gewicht und Anzeigen des Ergebnisses in BMI
  function BMI_Brechnnen() {
	  result1 =  Gewicht.value/((Koerpergroeße.value/100)*(Koerpergroeße.value/100));
	  result.value= Math.round ( result1 * 100) / 100;
   
  }

  // Ereignis-Listener zum Überwachen von Änderungen an Koerpergroeße und Gewicht
  Koerpergroeße.addEventListener('input', BMI_Brechnnen);
  Gewicht.addEventListener('input', BMI_Brechnnen);
  
    
</script>



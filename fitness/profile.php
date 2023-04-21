
<?php
include("connect.php");
include("headervorlage.php");


echo "<head>";
echo "  <title>ANMELDEN</title>";
echo "  <title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "	<a href=\"entry.php\">NEW</a>";
echo "</div>";
echo " <h1>ANMELDEN</h1>";
echo<<<formular
<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}
th {
  background-color:rgba(172,216,230,0.3);
  }
td{
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
formular;

if(isset($_POST['login'])) {
 $Familienname = $_POST['Familienname'];
$passwort = $_POST['passwort'];

$sql = "SELECT * FROM mitarbeiter WHERE Familienname='$Familienname' AND passwort='$passwort'";

$result=mysqli_query($verbindung, $sql);
	
 if( mysqli_num_rows($result)>0){

	
  echo "Anmeldung Erfolgt";
  
	
$pdo = new PDO('mysql:host=localhost;dbname=fitniss_db', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM mitarbeiter WHERE Familienname=:Familienname AND passwort=:passwort');
$stmt->bindParam(':Familienname', $Familienname);
$stmt->bindParam(':passwort', $passwort);
// Execute the query
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";

echo "<tr><th><Mitarbeiter_ID</th><th>Vorname</th><th> Familienname</th><th>Geburtsdatum</th><th>Funktion</th></tr>";

foreach ($results as $row) {
    echo "<tr><td>" . $row["Mitarbeiter_ID"] . "</td><td>" . $row["Vorname"] . "</td><td>".$row["Familienname"] . "</td><td>" . $row["Geburtsdatum"] . "</td><td>" . $row["Funktion"] .  "</td></tr>";
}

echo "</table>";
 }
else {
        echo " Falscher Benuzername oder Passwort " . mysqli_error($verbindung);
    }
}

echo "</body>";

$verbindung->close();
?>
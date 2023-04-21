<?php

include("connect.php");
include("headervorlage.php");

require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

	$row = db_query("SELECT *
FROM `gesundheitsinfos`
INNER JOIN `users`
ON gesundheitsinfos.Mitarbeiter_ID = users.id
WHERE  users.id= :id limit 1",['id'=>$id]);

	if($row)
	{
		$row = $row[0];
	}
	
?>
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

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesundheitsinfos Zeigen</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>

<div class="text-center p-1"><a href="index.php">ZURUCK</a></div>



			

<table>

<tr><th>aktivitaet_ID </th><th>Koerpergroeße</th><th> Gewicht</th><th>Lebensalter</th><th>Aktivitaet</th><th>Dauer</th><th>datum</th><th>BMI</th></tr>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=profile_db', 'root', '');

$stmt = $pdo->prepare('SELECT *
FROM `gesundheitsinfos`
INNER JOIN `users`
ON gesundheitsinfos.Mitarbeiter_ID = users.id
WHERE  users.id= :id ');
$stmt->bindParam(':id', $id);

// Execute the query
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    echo "<tr><td>" . $row['aktivitaet_ID'] . "</td><td>" . $row["Koerpergroeße"] . "</td><td>".$row["Gewicht"] . "</td><td>" . $row["Lebensalter"] . "</td><td>" . $row["Aktivitaet"] ."</td><td>" . $row["Dauer"] ."</td><td>" . $row["datum"] . "</td><td>" . $row["BMI"] .  "</td></tr>";
}
//echo " <form method='post' action=\"export.php\"><input type='hidden' name=\"Mitarbeiter_ID\" value=\"$Mitarbeiter_ID\"><input type=\"submit\" name='Exportieren_fahrer' value=\"Exportieren\"></form>&nbsp";
echo " <input type=\"submit\" onclick=\"window.print();\" name='Drucken' value=\"Drucken\"><br> &nbsp";
?>
</table>


</body>
</html>
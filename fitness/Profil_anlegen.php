
<?php

include("connect.php");
include("headervorlage.php");

echo "<head>";
echo "	<title>Mitarbeiter hinzufügen</title>";
echo "	<title>Navigation Bar</title>";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">";
echo "</head>";
echo "<body>";
echo " <div class=\"navbar\">";
echo "	<a href=\"welcome.php\">STARTSEITE</a>";
echo "	<a href=\"admin.php\">DASHBOARD</a>";
echo "	<a href=\"abfrage.php\">FAHRTEN ABFRAGE</a>";
echo "</div>";
echo "	<h1>Mitarbeiter hinzufügen</h1>";
echo "	<form class=\"form\" method=\"post\" action=\"add_mitarbeiter.php\">";

echo "		<label for=\"Mitarbeiter_ID\">Mitarbeiter_ID:</label>";
echo "		<input type=\"number\" name=\"Mitarbeiter_ID\" id=\"Mitarbeiter_ID\" required><br><br>";
echo "		<label for=\"Vorname\">Vorname:</label>";
echo "		<input type=\"text\" name=\"Vorname\" id=\"Vorname\" required><br><br>";
echo "		<label for=\"Familienname\">Familienname:</label>";
echo "		<input type=\"text\" name=\"Familienname\" id=\"Familienname\" required><br><br>";
echo "		<label for=\"Geburtsdatum\">Geburtsdatum:</label>";
echo "		<input type=\"date\" style=\"background-color: rgba(172,216,230,0.3)\" name=\"Geburtsdatum\" id=\"Geburtsdatum\" required><br><br>";

echo "		<label for=\"Funktion\">Funktion:</label>";
echo "		<input type=\"text\" name=\"Funktion\" id=\"Funktion\" required><br><br>";



echo "<input type=\"submit\" value=\"Hinzufügen\">";
echo "</form>";
echo "</body>";

	
		
		
?>
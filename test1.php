<?php
// connection � la base
$link = mysqli_connect('localhost', 'root', '', 'library') or die('Could not connect: ' . mysql_error());
// Prepare la requete et l'execute
$query = 'SELECT b.name, b.author, b.isbn FROM book as b';
$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_/error());
// ecrit les headers des tables
echo "<table border='1'>\n";
//Recuperation des enregistrements dans un tableau associatif
$line = mysqli_fetch_assoc($result);
//Test que le tableau est non null et affiche les noms des colonnes
if ($line == null)
	return;
	echo "\t<tr>\n";
	foreach ($line as $key => $col_value) {
		echo "\t\t<td>$key</td>\n";
	}
	echo "\t</tr>\n";
	// ecrit les resultats dans la table
	mysqli_data_seek($result, 0);
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $key => $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	// libere les resultats et ferme la connection
	mysqli_free_result($result);
	mysqli_close($link);
?>

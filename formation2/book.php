<?php
$link = mysqli_connect('localhost', 'root', 'root','library') or die('Could not connect: ' . mysql_error());
header('Content-type: application/json');
// Check for the path elements
$path = $_SERVER['PATH_INFO'];
if ($path != null) {
	$path_params = explode ("/", $path);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($path_params[1] != null) {
		settype($path_params[1], 'integer');
		$query = "SELECT b.id, b.name, b.author, b.isbn FROM book as b WHERE b.id = $path_params[1]";
	} else {
		$query = "SELECT b.id, b.name, b.author, b.isbn FROM book as b";
	}
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	//Cr�ation d�un array list identifi� par la cl� books
	$response["books"] = array();

	//Parcours du fichier et creation d�un array pour r�cup�rer les //informations concernant un livre. Chaque livre est compris dans //un Array
	while ($row = mysqli_fetch_array($result)) {

		$book = array();
		$book["id"] = $row["id"];
		$book["name"] = $row["name"];
		$book["author"] = $row["author"];
		$book["isbn"] = $row["isbn"];
		 

		// Chaque array de livre est pouss� dans l�array global identif� //par books
		array_push($response["books"], $book);
	}

	mysqli_free_result($result);
}
//Pour convertir l�array en array json
$encode_donnees = json_encode($response);
//met a disposition de l�application android les donn�es json
print_r($encode_donnees);
mysqli_close($link);
?>

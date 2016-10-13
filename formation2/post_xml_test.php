<?php
$input = file_get_contents("php://input");
$xml = simplexml_load_string($input);
foreach ($xml->book as $book) {
	echo $book->name.'<br>';
	echo $book->author.'<br>';
	echo $book->isbn.'<br>';
}
?>
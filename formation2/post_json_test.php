<?php
$obj = json_decode($chaine,true);
var_dump($obj);
foreach ($obj as $key=>$value) {
	foreach ($value as $id=>$val) {
		echo $id."=>".$val;
	}

}
?>
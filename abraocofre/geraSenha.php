<?php
	session_start();    
	$simbolos = ["a", "b", "c", "d", "e", "f"];
	$resposta = [0, 0, 0, 0];
	shuffle($simbolos);
	for ($i = 0; $i < 4; $i++){
		$resposta[$i] = $simbolos[$i];
	}
	$_SESSION["answer"] = implode("",$resposta);
	echo $_SESSION["answer"];  
?>

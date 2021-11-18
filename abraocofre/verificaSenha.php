<?php
    session_start(); 
	$posResp = 0;
	$posTent = 0;
	$mesmaPos = 0;
	$numCerto = 0;
	$st = $_GET['st'];
    $answer = $_SESSION["answer"];
	if($_SESSION["answer"] != $st){
		for ($i = 0; $i < 4; $i++){     
			$letra = $st[$i];
			if ($letra === $answer[$i]) {
				$mesmaPos++;
			}else if(strpos($answer, $letra) !== false ) {
				$numCerto++;
			}
		}
	    echo($numCerto);    
        echo($mesmaPos);
	} else {
		echo "acabou";
		session_unset();
		session_destroy();
	}
?>

<?php
	include('actions/conexao.php');
	session_start();
	$apelido = $_COOKIE["id"];
	$pontuacao = $_GET['pont'];
	
	$sql = "SELECT COALESCE(acumulado, 0) as acumulado, COALESCE(partidas, 0) as partidas FROM usuario where apelido='$apelido'";
	$resultado = mysqli_query($conexao,$sql);
	$resultado = mysqli_fetch_assoc($resultado);
	$acumulado = $resultado['acumulado'];
	$partidas = $resultado['partidas'];
	echo "oldacumulado" . "-" . $acumulado;
	$acumulado += $pontuacao;
	$partidas++;
	echo " acumulado" . "-" . $acumulado;
	echo " partidas" . "-" . $partidas;
	
	$sql = "UPDATE usuario SET acumulado='$acumulado', partidas='$partidas', ultimapartida='$pontuacao' where apelido='$apelido'";
	$resultado = mysqli_query($conexao,$sql);
	echo " cheguei" . "-" . $resultado;
	
	mysqli_close($conexao);
?>
<?php
	session_start();
	$apelido = $_POST["apelido"];
	$senha = $_POST["senha"];
	
	include('actions/conexao.php'); 
	
	$sql = "SELECT * FROM usuario where apelido='$apelido'";
		
	$resultado = mysqli_query($conexao,$sql);
	$linhas_ret = mysqli_num_rows($resultado);
	
	$linha = mysqli_fetch_array($resultado);
	
	if($linhas_ret==0){ //conexão não retornou nenhum resultado
		echo "<html>";
		echo "<body>";
		echo "<p align=\"center\">Usuário Não Encontrado!</p>";
		echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
		echo "</body>";
		echo "</html>";
	}
	else{
		if($senha != $linha["senha"]){
			echo "<html>";
			echo "<body>";
			echo "<p align=\"center\">A Senha está incorreta!</p>";
			echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
			echo "</body>";
			echo "</html>";
		}
		else{ //usuário e senhas corretos. Cria cookie
			//$_SESSION["id"] = $apelido;
			//echo $_SESSION["id"];
			setcookie("id", $apelido, time() + 60*60*24*15, '/');
			setcookie("senha_usuario",$senha);
			header("Location: paginaPrincipal.html"); //Direciona para a página inicial dos usuários cadastrados
		}
	}
	mysqli_close($conexao);
?>
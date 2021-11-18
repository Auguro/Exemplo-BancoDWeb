
<html>
	<head>
		<link rel="stylesheet" href="style2.css">
        <?php include "geraSenha.php"; ?>
	</head>
	<body>
		<script>
			var idLetra = 1;
			var st="";
			var current;
			var i;
			var pontuacao = 10;
			var tentativas = 1;
			var idTentativa = 1;
			
			function escreve(bagulho){
				document.getElementById(idLetra).innerHTML =  bagulho;
				st = st + bagulho;
				current = document.getElementById("tentativa");
				current.value = st;
				idLetra++;
			}
			async function verificador(){
				if (tentativas <= 10){	
					let data = await fetch("verificaSenha.php?st="+ st);
					let texto = await data.text();
					for (i = 1; i <= 4; i++) {
						document.getElementById(i).innerHTML ="";
					}
					var result = ganhou(texto);
					document.getElementById("numCerto").innerHTML = texto.substring(1, 0);
					document.getElementById("posCerta").innerHTML = texto.substring(1, 2);
					if(result == 0){
						data = await fetch("inserePontuacao.php?pont="+ pontuacao);
						window.location.href="paginaPrincipal.html";
					}
					var w = "old" + idTentativa;
					console.log(w);
					console.log(st);
					document.getElementById(w).innerHTML = st;
					w = "tent" + idTentativa;
					console.log(w);
					document.getElementById(w).style.backgroundColor = "red";
					tentativas++;
					pontuacao--;
					idTentativa++;
					idLetra = 1;
					st="";
					i = 1;
				} else{
					window.location.href="paginaPrincipal.html";
				}
			}
			function ganhou(str) {
				var n = str.localeCompare("acabou");
				return n;
			}
		</script>
		<div class="cofre">
			<p id="1" class="display1"></p><p id="2" class="display2"></p><p id="3" class="display3"></p><p id="4" class="display4"></p>
			<form>
				<input type ="hidden" id="tentativa" name="tentativa" value="" />
			</form>
			<div align="center" class="aaa">
				<button class="botoes" onclick="escreve('a')"></button>
				<button class="botoes" onclick="escreve('b')"></button>
				<button class="botoes" onclick="escreve('c')"></button>
				<button class="botoes" onclick="escreve('d')"></button>
				<button class="botoes" onclick="escreve('e')"></button>
				<button class="botoes" onclick="escreve('f')"></button>
				<button class="alavanca" onclick="verificador()"></button>
				<p id="numCerto" class="numCerto"></p>
				<p id="posCerta" class="posCerta"></p>
			</div>
			<div>
				<span class="tentativa tentativa1" id="tent1"></span>
				<span class="tentativa tentativa2" id="tent2"></span>
				<span class="tentativa tentativa3" id="tent3"></span>
				<span class="tentativa tentativa4" id="tent4"></span>
				<span class="tentativa tentativa5" id="tent5"></span>
				<span class="tentativa tentativa6" id="tent6"></span>
				<span class="tentativa tentativa7" id="tent7"></span>
				<span class="tentativa tentativa8" id="tent8"></span>
				<span class="tentativa tentativa9" id="tent9"></span>
				<span class="tentativa tentativa10" id="tent10"></span>
			</div>
			<div>
				<p class="old" id="old1"></p>
				<p class="old" id="old2"></p>
				<p class="old" id="old3"></p>
				<p class="old" id="old4"></p>
				<p class="old" id="old5"></p>
				<p class="old old2" id="old6"></p>
				<p class="old old2" id="old7"></p>
				<p class="old old2" id="old8"></p>
				<p class="old old2" id="old9"></p>
				<p class="old old2" id="old10"></p>
			</div>
		</div>
		
	</body>
	

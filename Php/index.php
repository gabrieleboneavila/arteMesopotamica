<!doctype html>
<html lang="en">

<head>
	<!-- Link para CSS e AOS -->
	<?php include "../Includes/linksCSSinicio.html" ?>

	<title>Home</title>
</head>

<body>
	<!-- NavBar -->
	<?php include "../Includes/navBar.html" ?>
	<!-- Navbar -->
	
	<div id="mae">
		<div id="titulo">
			<div id="divFilha">
				<div data-scroll id='zigurate'>
					<div id="flechaIndicativa" class="flecha">
						<i class="material-icons">
							arrow_right_alt
						</i>
					</div>
					<div id="flechaIndicativaDireita" class="flecha">
						<i class="material-icons">
							arrow_right_alt
						</i>
					</div>
					<!-- Inclui Zigurate -->
					<?php include '../Includes/zigurate.php' ?>
				</div>
				</div>
			</div>
				<div data-scroll id="divFilha1">Arte Mesopotâmica</div>
				<div data-scroll id="divFilha2">Aprenda Divertindo-se!</div>
		
		<div>
			<?php include "../Includes/simboloMaior.html" ?>

		</div>
	</div>
	</div>
	<!----------------------Primeira div Principal------------------->

	<div  class="divPrincipal">

		<div class="tituloCartoes">
			Arte
			<div class="subtituloCartoes">
				A arte de um povo é o reflexo autêntico de sua mentalidade - Nehru
			</div>
		</div>

		<div class="cartoes">
			<div id='arte1' class="cartao carC-lin1">
				<div class="contentCard cardArte1">
					<div class="tituloCartao">Esculturas</div>
					<div class="textoCartao">
						Sabia que elas tinham o papel de decoração para túmulos e templos?
					</div>
				</div>
			</div>

			<div id='arte2' class="cartao carC-lin2">
				<div class="contentCard">
					<div class="tituloCartao">Zigurates</div>
					<div class="textoCartao">
						São as construções mais famosas! Quer ver um? <a  id="aparecerFlecha" href="#">Clica em mim!</a>
					</div>
				</div>
			</div>

			<div id='arte3' class="cartao carC-lin3">
				<div class="contentCard">
					<div class="tituloCartao">Literatura</div>
					<div class="textoCartao">
						Nela encontramos o livro mais antigo do mundo! Você sabe o nome?
					</div>
				</div>
			</div>
		</div>

		<div>
			<button id='btn1' class="botaoEnviar">
				Descubra!
			</button>
		</div>
	</div>

	<!----------------------Segunda div Principal------------------->


	<div id="divSegunda">

		<div id="tituloQuiz">
			Quiz
			<div style="color:#858585" class="subtituloCartoes">
				Vamos levar a vida com a seriedade brincante que ela merece - O. Wilde
			</div>
		</div>
		<div class="cartoes">

			<div id='quiz1' class="cartao carE-lin1">
				<div class="contentCard">
					<div class="tituloCartao">
						Diversão
					</div>
					<div class="textoCartao">
						Aprenda o nome das obras da forma mais divertida: jogando!
					</div>
				</div>
			</div>
			<div id='quiz2' class="cartao carE-lin2">

				<div class="contentCard">
					<div class="tituloCartao">Quebra-Cabeça</div>
					<div class="textoCartao">
						Em quanto tempo você consegue "desvendar" cinco obras?
					</div>
				</div>

			</div>

			<div id='quiz3' class="cartao carE-lin3">
				<div class="contentCard">
					<div class="tituloCartao">
						Inteligente?
					</div>
					<div class="textoCartao">
						Você acha que domina o conteúdo 100%? Bora testar!
					</div>
				</div>
			</div>
		</div>
			<button type="submit" class="botaoEnviar">
				Divirta-se!
			</button>
	</div>

	<!-- --------------------Terceira div Principal----------------- -->

	<div id="divTerciaria">
		<div class="tituloCartoes">Colorir<div class="subtituloCartoes">Viva intensamente em mil cores porque a vida é um arco-íris que só você pode colorir. -  Em Mil cores </div>
		</div>
		<div class="cartoes">
			<div id='ajuda1' class="cartao carC-lin1">

				<div class="contentCard">
					<div class="tituloCartao">Pinte</div>
					<div class="textoCartao">
						Divirta-se pintando imagens meso-<br>potâmicas.
					</div>
				</div>
			</div>

			<div id='ajuda2' class="cartao carC-lin2">

				<div class="contentCard">
					<div class="tituloCartao">Recordação</div>
					<div class="textoCartao">
						Tenha uma recor-<br>dação da Mesopo-<br>tâmia!
				</div>
				</div>
			</div>
			<div id="ajuda3" class="cartao carC-lin3">

				<div  class="contentCard">
					<div class="tituloCartao">Salve</div>
					<div class="textoCartao">
					Quer guardar a tua magnífica pintura? Basta <br>salvá-la :) 
				</div>
				</div>
			</div>
		</div>
			<button type="submit" class="botaoEnviar">
				Pintaaar!
	</div>

	<!-- Footer -->
	<?php include "../Includes/footer.html" ?>
	<!-- JavaScript -->
	<!-- Bootstrap  e JQuery-->

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- AOS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
	<!-- Aparecer e Desaparecer Menu -->
	<script src="../JS/aparecerMenuSmartphone.js">
	</script>

	<!-- Script Contendo pequenas modificações na página, como o aparecimento das flechas -->
	<script src="../JS/scriptHome.js"></script>

	<!-- Scripts extras (como animação) -->
	<?php include "../Includes/scripts.html" ?>
</body>

</html>
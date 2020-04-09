<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- LINKS CSS -->
  <?php include "../Includes/linksCSSinicio.html" ?>

  <!-- Bread -->
  <?php $bread3 = "Quiz" ?>
  <title>Quiz</title>
</head>

<body>
  <!-- NavBar -->
  <?php include_once '../Includes/navBar.html' ?>

  <div id='mae'>
    <!-- BreadCrumbs -->
    <?php include_once '../Includes/breadCrumbs.php' ?>

    <div id='brainSVG'>
      <img src='../SVGs/brain-svgrepo-com.svg' />
    </div>
    <!-- Textos -->
    <div id="divFilha1">
      Quiz
    </div>
    <div id="divFilha2">
      Escolha um assunto e torne o aprendizado divertido!
    </div>
    <!-- Seta Para baixo -->
    <div>
      <?php include "../Includes/simboloMaior.html" ?>
    </div>
  </div>
  <div class="divPrincipal">
    <div class="title-white-normal mt-5">
      Puzzles
    </div>
    <div class="subtituloCartoes mb-4">
      Se o individuo é passivo intelectualmente, não conseguirá ser livre moralmente. - J. Piaget
    </div>
    <div class="cartoesUnico">
      <div id='puzzle1' class="cartao carC-lin2">
        <div class="contentCard cardArte1">
          <div class="tituloCartao">Diversão</div>
          <div class="textoCartao">
            Será que você consegue completar todos os puzzles?
          </div>
        </div>
      </div>
    </div>
    <div>
      <button id='btn1' class="botaoEnviar">
        Jogar!
      </button>
    </div>
  </div>

  <div id="divSegunda">
    <div class="title-grey-normal">
      Testes
    </div>
    <div class="subtitle-grey-normal mb-4">
      O conhecimento pronto estanca o saber e a dúvida provoca a inteligência. - Vigotsky
    </div>
    <div class="cartoesUnico">

      <div id='puzzle2' class="cartao carE-lin1">
        <div class="contentCard">
          <div class="tituloCartao">
            Treino </div>
          <div class="textoCartao">
            Enfrente desafios e pratique o que acabou<br />de aprender!
          </div>
        </div>
      </div>
      <div>
        <button id='btn2' class="botaoEnviar">
          Treinar!
        </button>
      </div>
    </div>
  </div>
  <?php include "../Includes/footerDark.html";
  // Scripts
        include "../Includes/scripts.html";
        include "../Includes/opcoesNiveis.php"
  ?>
  <script>
    $("#btn1").click(()=>{
      window.location="puzzlePage.php";
    })
    $("#btn2").click(()=>{
      alert("Parte do outro grupo");
    })  </script>

      <!-- Aparecer e desaparecer menu -->
  <script src="../JS/aparecerMenuSmartphone.js"></script>
        
</body>

</html>
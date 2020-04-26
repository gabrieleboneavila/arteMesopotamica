<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "../Includes/linksCSSinicio.html" ?>
  <title>Manual</title>
 

</head>

<body>
  <!-- Nav Bar -->
  <?php include "../Includes/navBar.html" ?>

  <div id="mae">

    <!-- BreadCrumb -->
    <?php
    $bread2 = [["Ajuda", "ajudaPage.php"]];
    $bread3 = "Manual";
    include "../Includes/breadCrumbs.php";
    ?>
    <div class='mt-5' id='manSVG'>
      <img src="../Icons/manuel.svg" alt="">
    </div>

    <div id="divFilha1">Manual</div>
    <div id="divFilha2">Tire todas as tuas dúvidas!</div>
    <!-- Simbolo Maior -->
    <div><?php include "../Includes/simboloMaior.html" ?></div>
  </div>

  <div class="divPrincipal">
    <div class="title-white-normal">
      PDF
    </div>
    <div class="cartoesUnico">

      <div class="arteIcones cartao carC-lin1" style="--imagemArte:url(../Icons/map-pink-24dp.svg)">
        <div class="contentCard">
          <div class="tituloCartao">Baixar Manual</div>
          <div class="textoCartao">Clique no botão abaixo e tenha acesso ao manual do site!</div>
        </div>
      </div>
      <div>
        <a  class="botaoEnviar" style='display:flex;justify-content: center; align-items: center;text-decoration:none; color:white !important' href='../PDF/Verium_Ajuda.pdf' download="">Baixar</a>
      </div>
    </div>
  </div>

  <!-- Footer e scripts -->
  <?php include "../Includes/footer.html";
  include "../Includes/scripts.html";
  ?>

  <!-- Script para navbar funcionar em celulares -->
  <script src='../JS/aparecerMenuSmartphone.js'></script>

</body>

</html>
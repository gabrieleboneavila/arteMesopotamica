<?php
$data = file_get_contents("../JSON/ajuda.json");
$data = json_decode($data, true);
$Puzzles = [];
$id = 100;
foreach ($data as $informacao) {
  $arrayInformacao = ["icone" => $informacao["icone"], "titulo" => $informacao["titulo"], "conteudo" => $informacao["conteudo"], "botao" => $informacao["botao"], "estilo" => "style='z-index:$id'", "id" => $informacao['id']];
  $Puzzles[] = $arrayInformacao;
  $id--;
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajuda</title>
  <!-- Links CSS -->
  <?php include "../Includes/linksCSSinicio.html" ?>
</head>

<body>
  <!-- Nav Bar -->
  <?php include "../Includes/navBar.html" ?>

  <div id="mae">
    <!-- BreadCrumbs -->
    <?php $bread3 = 'Ajuda';
    include "../Includes/breadCrumbs.php" ?>

    <div class='mt-5' id="divfilha">

      <!-- Icone -->
      <div id='ajudIcon'>
        <img src="../Icons/ajuda.svg" alt="">
      </div>

    </div>
      <div id="divFilha1"> Ajuda</div>
      <div class='text-center' id="divFilha2">Tire a tua dúvida</div>

    <!-- Include do simbolo -->
    <div> <?php include "../Includes/simboloMaior.html" ?></div>
  </div>

  <?php
  $cont = 0;
  $contC = 0;
  $contE = 0;
  $cor;
  foreach ($Puzzles as $informacao) {
    $cont % 2 !== 0 ? $classe = "curva-clara"   : $classe = "curva-escura";
    if ($cont % 2 === 0) {
      $cor           = "carC-lin" . ($contC % 3 + 1);
      $contC++;
    } else {
      $cor = "carE-lin" . ($contE % 3 + 1);
      $contE++;
    }
    // data-id serve para redirecionar para o cookie
    echo "<div data-id='${informacao['id']}'${informacao['estilo']} class=\"$classe \" >
           <div class=\"cartoesUnico\">
             <div style='--imagemArte:url(${informacao['icone']})' class=\"arteIcones cartao $cor\">
               <div class=\"contentCard\">
                 <div class=\"tituloCartao\">
                   ${informacao['titulo']} </div>
                 <div class=\"textoCartao\">
                 ${informacao['conteudo']}
                 </div>
               </div>
             </div>
             <div>
               <button id='btn2' class=\"botaoEnviar\">
               ${informacao['botao']}
               </button>
             </div>
          </div>
         </div>  
           ";
    $cont++;
  }
  ?>
  <?php include "../Includes/footerDark.html" ?>

  <!-- Scripts Necessários -->
  <?php include "../Includes/scripts.html" ?>
  <!-- Nav Bar para celulares -->
  <script src='../JS/aparecerMenuSmartphone.js'></script>

  <script>
    $(".botaoEnviar").click((e) => {
      // e.target é equivalente ao this, em funções convencionais, porém aqui nós não podemos utilizar o this, essa a razão do .target
      var $this = e.target,
        // Id para permitir o sitema saber qual pag o usuario quer ir
        $url = $($this).parent().parent().parent().attr('data-id');


      window.location = $url;
    })
  </script>
</body>

</html>
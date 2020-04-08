<?php 
// Váriaveis PHP necessárias para o bom funcionamento desse include:
// $tituloPrincipalGatilho = obrigatória, título PRINCIPAL
// 
// $tituloRandom1 = obrigatória, coloca o título
// $textoRandom1  = obrigatória, coloca o texto
// // $dataID1       = não é obrigatória, mas tem papel fundamental para enviar para outro puzzle(nos games)       
// $botao1        = obrigatória, texto do botão
// $icon1         = obrigatória, coloca o ícone no círculo branco (id="random1")
// 
// 
// $tituloRandom2 = obrigatória, coloca o título
// $textoRandom2  = obrigatória, coloca o texto
// $dataID2       = mesmo que o dataID1
// $dataNivel     = só necessária no puzzle, nos outros não precisa
// $botao2        = obrigatória, texto do botão
// $icon2         = obrigatória, coloca o ícone no círculo branco (id="random2")
//  ?>
<div class="mt-5 title-white-normal">
    <?= $tituloPrincipalGatilho?>
    </div>
    <div class="cartoesDeDois">
      <!-- Style para adiconar $icon1 e 2 ao #random1 e 2, caso contrário não teríamos ícones -->
      <style>
          #random1::before{
            background-image: <?= $icon1 ?>;
          }  
          #random2::before{
            background-image: <?= $icon2 ?>;
          }  
      </style>
      <div id='random1' class=" cartao carC-lin2">
        <div class="contentCard">
          <div class="tituloCartaoRandom"><?php echo $tituloRandom1?></div>
          <div class="textoCartaoRandom">
          <?php echo  $textoRandom1?>
          </div>
        </div>
        <div data-id=<?php echo $dataID1 ?> id="botaoEnviarPequeno" class="botaoEnviarPequeno">
        <?= $botao1 ?>
        </div>
      </div>
      <div id='random2' class="cartao carC-lin3">
        <div class="contentCard">
          <div class="tituloCartaoRandom"><?php echo $tituloRandom2?></div>
          <div class="textoCartaoRandom">
            <?=$textoRandom2?>
          </div>
        </div>
        <div data-nivel=<?php echo $dataNivel ?> data-id=<?php echo $dataID2?>
          class="botaoEnviarPequeno">
        <?= $botao2 ?>
        </div>
      </div>
    </div>
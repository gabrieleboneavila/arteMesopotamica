<?php $data = file_get_contents("../JSON/quiz.json"); 
      $data = json_decode($data,true);
      $Puzzles = [];
      $id = 100;
   foreach($data as $informacao)
   {
    $arrayInformacao = ["nome"=>$informacao["nome"],"imagem"=>$informacao["imagem"],"estilo"=>"style='z-index:$id'","id"=>$informacao['id']];
    $Puzzles[] = $arrayInformacao;
    $id--;
   }
  //  Bread
   $bread2 = [["Quiz","quizPage.php"]];
   $bread3="Puzzles"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Para mudar margin-top do título apenas nessa pag e do puzzleGame -->
  <style>
    #titulo{
      margin-top: 2% !important;
    }
  </style>
  <!-- LINKS CSS  -->
  <?php include "../Includes/linksCSSinicio.html"?>
  <title>Puzzle</title>
</head>
<body>
    <!-- Navbar -->
    <?php include "../Includes/navBar.html" ?>

    <div id="mae">
      <?php include "../Includes/breadCrumbs.php" ?>
      <div id="puzzleSVG">
        <?php include "../Includes/puzzle.html" ?>
      </div>
      <div id="divFilha1">
        Puzzles
      </div>
      <div id="divFilha2">
        Escolha uma obra e divirta-se
      </div>
      <div>
        <?php include "../Includes/simboloMaior.html" ?>
      </div>
    </div>

      <?php 
        $cont = 0;

        foreach($Puzzles as $informacao)
        { 
          $cont%2!==0 ? $classe = "curva-clara"   : $classe = "curva-escura"  ;
          $cont%2!==0 ? $title = "title-grey-normal"   : $title = "title-white-normal"  ;

          echo "<div ${informacao['estilo']} class=\"$classe \" >
                  <div class='$title mt-5'>
                    ${informacao["nome"]}
                  </div>        
                  <div style='background-image:url(${informacao['imagem']})' class='imgPuzzle mt-5'>
                  </div>
                <button data-id=\"${informacao['id']}\" id=\"${informacao['id']}\" class='btnPuzzle botaoEnviar' >Jogar!</button>
                </div>  
          ";
          $cont++;
        }
      ?>
   
    <?php include "../Includes/footer.html";
        // Scripts
          include "../Includes/scripts.html";
          include "../Includes/opcoesNiveis.php"

    ?>
    
   
  <!-- Aparecer e desaparecer menu -->
  <script src="../JS/aparecerMenuSmartphone.js"></script>
        
<script>

var recOb = 0, botao = ".botaoEnviar", conf1 = 1;
</script>

<script src='../JS/escolhaNivel.js'></script>
</body>
</html>


<?php $data = file_get_contents("../JSON/desenhos.json"); 
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
   $bread3="Colorir"
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
  <title>Colorir</title>
</head>
<body>
    <!-- Navbar -->
    <?php include "../Includes/navBar.html" ?>

    <div id="mae">
      <?php include "../Includes/breadCrumbs.php" ?>
      <div id="ursoSvg" class="mt-5">
        <?php include "../Icons/ursinho.svg" ?>
      </div>
      <div id="divFilha1">
      Colorir
      </div>
      <div id="divFilha2">
        Escolha uma obra e a pinte 
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
                <button data-id=\"${informacao['id']}\" id=\"${informacao['id']}\" class='btnPuzzle botaoEnviar' >Pintar!</button>
                </div>  
          ";
          $cont++;
        }
      ?>
   
    <?php include "../Includes/footer.html";
        // Scripts
          include "../Includes/scripts.html";

    ?>
    
   
  <!-- Aparecer e desaparecer menu -->
  <script src="../JS/aparecerMenuSmartphone.js"></script>
        
<script>
$(()=>{
$(".imgPuzzle").click((e)=>{
  var $this = e.target
  $($this).parent().find("button").trigger('click')
})

$(".botaoEnviar").click((e)=>{
  var $this = e.target
  document.cookie= "colorirId="+$($this).attr("id")
  window.location = "colorir.php"
})


})
</script>

</body>
</html>


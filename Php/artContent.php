<?php
// Funções
  //Aqui sorteia-se alguma posição de vetor, por isso o rand e o -1 pq o count diz o tamanho do   vetor, desconsiderando a posição inicial (0)
  function randFu($vetor)
  {
    if(gettype($vetor) === 'array')
    return $vetor[rand(0,(count($vetor)-1))];
  }

// Definindo COOKIE
  $id = $_COOKIE['idArte'];

// Informações para o vídeo (lingua e link do vídeo)
  $ling = "../Icons/brazil-flag.svg";
  $vide = "";

// Pegando dados do arte.json
  $data    = file_get_contents("../JSON/arte.json");
  $data    = json_decode($data, true);
  $info    = [];
  $sorteio = [];

// Passando $data pelo foreach que tem o mesmo id advindo do cookie
  foreach ($data as $valor) {
    if ($valor['id'] === $id) {
      $info = $valor;
    } else {
      $sorteio[] = $valor;
    }
  }

// Variáveis para colocar no Título, texto, imagem, video, etc.
  $nome   = $info['titulo'];
  $parag1 = $info['parag1'];
  $parag2 = $info['parag2'];
  $img    = $info['img'];
  $vide   = $info['vid'];
  $ling   = $info['legenda'];

// Links para breadCrumbs e seus nomes
  $bread2 = [["Arte", "artPage.php"]];
  $bread3 = $nome;

// Pegando as curiosidades e valores Sorteados
  $curiosidades = file_get_contents('../JSON/curiosidArte.json');
  $curiosidades = json_decode($curiosidades,true);
  // Manda Para randFu, para sortear $curiosidades
    $selecionada  = randFu($curiosidades);
  // Faz a mesma coisa que o de cima, Sorteando Recomendação
    $sorteado1    = randFu($sorteio);
    $sorteado2    = randFu($sorteio);

// Para Impedir que $sorteado1 e 2 sejam iguais
  while($sorteado1 === $sorteado2)
  {
      $sorteado2 = randFu($sorteio);
  }

// Pegando info dos $sorteado1 e 2
  $sortei1ID = $sorteado1['id'];
  $sortei2ID = $sorteado2['id'];
  $sortei1Ti = $sorteado1['titulo'];
  $sortei2Ti = $sorteado2['titulo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Link para CSS e AOS -->
  <?php include "../Includes/linksCSSinicio.html" ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $nome ?></title>
</head>

<body>
  <?php include "../Includes/navBar.html" ?>
  <div id="mae">
    <?php include "../Includes/breadCrumbs.php" ?>
    <!-- Nome do assunto que o usuário está vendo -->
    <div class="mt-5 mb-5 title-grey-normal">
      <?= $nome?>
    </div>
    <!-- Aqui Coloca-se a descrição do assunto que o usuário está lendo -->
    <div class="descricaoArte">
      <?= $parag1 ?>
    </div>
    <!-- Imagem para o usuário ver -->
    <div class="arteImagem mt-5 mb-5">
      <img src=<?= $img ?> alt="">
    </div>
    <!-- O segundo parágrafo que o usuário lerá -->
    <div class="descricaoArte">
      <?= $parag2 ?>
    </div>
  </div>
  <div class="divPrincipal">
    <?php include "../Includes/videoDescritivo.php" ?>
  </div>
  <div id="divSegunda">
    <!-- Curiosidade aleátoria -->
    <div class="title-grey-normal">Curiosidade</div>
    <!-- Conteúdo é gerado aleatoriamente, por função utilizada em: addaquiondeé -->
    <div class="mt-5 descricaoArte">
      <?= $selecionada ?>
    </div>
  </div>
  <div id="divTerciaria">
    <?php
    $tituloPrincipalGatilho = "Leia Também!";
    // Informações necessárias para o funcionamento adequado do Random1 e 2(quadrado que contem informações sobre os jogos que o sistema oferece ao usuário). As váriaveis se autoexplicam, talvez dataID possa causar confusão, mas ela é, nada mais, do que o valor que será colocado no 'data-id=', você pode ver isso no include gatilhoparaoutrapag-leia-tambem, desculpem pelo norme gigante.
    $tituloRandom1 = $sortei1Ti;
    $textoRandom1  = "Vamos descobrir mais informações sobre esse tópico?";
    $dataID1       = $sortei1ID;
    $botao1        = "Vamos!";
    $icon1         = "url(../Icons/book-open.svg)";
    //  Aqui a mesma coisa, há presença do $dataNivel é necessária, pois senão não seria possivel saber o nível que o usuário será redirecionado, entretanto pode ser nula, em outra páginas você poderá ver isso.
    $tituloRandom2 = $sortei2Ti;
    $textoRandom2  = "Quer explorar esse assunto e se tornar um mestre?";
    $dataID2       = $sortei2ID;
    $dataNivel     = "null";
    $botao2        = "Sim!";
    $icon2         = "url(../Icons/brush-orange.svg)";
    include '../Includes/gatilhoparaoutrapag-leia-tambem.php' ?>
  </div>

  <?php include "../Includes/footer.html";
  include "../Includes/scripts.html"
  ?>
  <!-- Aparecer e Desaparecer Menu -->
  <script src="../JS/aparecerMenuSmartphone.js">
  </script>

  <!--Redirecionar Quando Clica Nos Cookies-->
  <script>
    $('.botaoEnviarPequeno').click((e)=>
    {
      var $this  = e.target,
          cookie = $($this).attr('data-id')

          document.cookie = "idArte = "+cookie
          $("html").animate({scrollTop:0},10)
          location.reload()
          
    })
  </script>
</body>

</html>
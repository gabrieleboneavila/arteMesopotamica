<?php
if($_COOKIE['nivel'] === "?")
{
  include "../Includes/linksCSSinicio.html";
  include "../Includes/opcoesNiveis.php";
  
  echo "
  <style>
  .modal-header{
    height:55px
  }
  </style>
  <title>Escolhendo Nível</title>
  <script
  src='https://code.jquery.com/jquery-3.5.0.min.js'></script>
  
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' ></script>

  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>

  ";

  echo "<script> $(()=>{
    var recOb = 0, botao = 'bao tenmos ho';  
    
    $('#escolheNivel').trigger('click') ;
      })
    $('.botaonivel').click((e)=>{
      var thiss = e.target;
      document.cookie = 'idNivel = '+$(thiss).text();
      document.cookie = 'nivel = '+$(thiss).text();

      location.reload()
    })
      </script>
  
      
      ";
      
  die();
}

// Vendo Se ID é válido 
function valida_id($value)
{ 

  global $todosId;
  foreach($todosId as $id)
  {
    if($id === $value)
    {
      return true;
    }
  } 
  $pag = "puzzlePage.php";
  include "../Includes/pagErro.php";
  die();
}
// Valida Nivel
function valida_nivel($nivel){
  global $niveis;
  foreach($niveis as $nivel1)
  { 
    if($nivel === $nivel1["nivel"])
    {
      return true;
    }
  }
  $pag = "puzzlePage.php";
  include "../Includes/pagErro.php";
  die();
}
// Isso é em conjunto com o compartilhar
// Pegando as informações para copiar automaticamente
include '../Includes/urlAtual.php';

// 0 = falso, 1 = verdadeiro, imagem = significa imagem de apoio
$niveis = [
  ["nivel" => "Noob", "usar" => "puzzleSVG", "imagem" => 1, "tempo" => 0],
  ["nivel" => "Good", "usar" => "puzzleIMG", "imagem" => 1, "tempo" => 0],
  ["nivel" => "Pro", "usar" => "puzzleSVG", "imagem" => 0, "tempo" => 1],
  ["nivel" => "God", "usar" => "puzzleIMG", 'imagem' => 0, "tempo" => 1]
];
// $valor = $_COOKIE['nivel'];
// $idObr = $_COOKIE['idObr'];


// Pegando Dados JSON
  $data = file_get_contents("../JSON/quiz.json");
  $data = json_decode($data, true);

  // Isso é em conjunto com o compartilhar
  $todosId = [];
  foreach ($data as $valor) {
    $todosId[] = $valor['id'];
  }

// Isso é em conjunto com o compartilhar
// Definindo COOKIE
//  Caso seja por um link compartilhado
$verifica = explode("?",$_SERVER['REQUEST_URI']);
if (count($verifica) > 1) {
  // Aqui pegamos o valor o valor que está na uri, tirando o dominio e a segunda variavel seleciona apenas as os valores que estão depois do ?
  $verifica = explode("?",$_SERVER['REQUEST_URI']);
  $verifica = $verifica[1];
  // Aqui decodifica todo o código que está depois do .php?
  $tudo = base64_decode($verifica);
  $tudo = explode("&",$tudo);
  valida_id($tudo[0]);
  $idObr = $tudo[0];
  $nivel = $tudo[1];
  $codif = $idObr."&".$nivel;
  setcookie('idObr',$idObr);
  setcookie('nivel',$nivel);
  valida_nivel($nivel);
}
// Caso seja por outro meio
else {
  
  $idObr = $_COOKIE['idObr'];
  $nivel = $_COOKIE['nivel'];
  $codif = $idObr."&".$nivel;
  valida_id($idObr);
  valida_nivel($nivel);
}
// Verificando se nível existe, ou usuário burlou sistema
for ($cont = 0; $cont < count($niveis); $cont++) {
  if ($nivel === $niveis[$cont]['nivel']) {
    break;
  } else if ($cont + 1 === count($niveis) && $nivel !== $niveis[$cont]['nivel']) {
    $pag = "puzzlePage.php";
    include "../Includes/pagErro.php";
    die();
  }
}

// Isso é em conjunto com o compartilhar
// Link Para Compartilhar
  //Codificação, para usuário não saber nome do cookie 
    $cod  = base64_encode($codif);
  //Colocando informações 
    $compa  =  UrlAtual() . "?" . $cod;

// Vetor para pegar apenas o array que corresponde ao puzzle selecionado pelo usuário
$info = [];
// Nome do Puzzle
$nome = "";
// Imagem ou vetor que Aparecera
$srcA = "";
// Video
$vide = "";
// Língua do Vídeo
$ling = "";
// Imagem para Descrição
$imgD = "";
// Se possui ou não o tempo regressivo 0 = nao, 1 = sim
$temp = "";
// Descrição, paragrafo 1
$par1 = "";
// Descrição, paragrafo 2
$par2 = "";

// Obras que serão recomendadas ao usuário
$sorteioObras = [];
// Foreach para pegar dados certos
foreach ($data as $dados) {
  if ($dados['id'] === $idObr) {
    $info = $dados;
  } else {
    $sorteioObras[] = [$dados["nome"], $dados['id']];
  }
}

// Colocando dados obtidos nas váriaveis
$nome = $info['nome'];
$vide = $info['video'];
$ling = $info['lingua'];
$imgD = $info['imagem'];
$par1 = $info['parag1'];
$par2 = $info['parag2'];

// Colocando Imagem ou Vetor para usuário montar o puzzle
($nivel !== "Good" && $nivel !== "God") ? $srcA = "${info['puzzleSVG']}" : $srcA = "${info['puzzleIMG']}";

// Escolhendo a cor do nível
$paleta = ["Noob" => "#17b978", "Good" => "#0e9577", "Pro" => "#7c203a", "God" => "#990000"];

foreach ($paleta as $key => $value) {
  if ($key === $nivel) {
    $nivelCor = $value;
    break;
  }
}
// Recomendações
$sorteioObras = $sorteioObras; //Só para não me perder eu repeti aqui ;)
$sorteado1Obra = rand(0, (count($sorteioObras) - 1));
$sorteado2Obra = $sorteado1Obra;
while ($sorteado1Obra === $sorteado2Obra) {
  $sorteado2Obra = rand(0, (count($sorteioObras) - 1));
}

// Sorteio do tempo e nivel, para provacar usuário 
$valoresSorteio = [' 1hr', '1 dia', '2 min', '5 seg', '1 seg', '10 min', '1 mês', '10 seg', '15 seg', '13 min', '17 seg', '18hr', '4hr', '49hr', '19 seg'];

$valorSorteado = rand(0, (count($valoresSorteio) - 1));

$niveisSorteio = ["Noob", "Good", "Pro", "God"];

$valorNivel = rand(0, (count($niveisSorteio) - 1));

// Caminho BreadCrumb
$bread2 = [["Quiz", "quizPage.php"], ["Puzzles", 'puzzlePage.php']];
$bread3 = $nome
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- LINKS CSS  -->

  <?php include "../Includes/linksCSSinicio.html";
  ?>
    <!-- Para mudar margin-top do título apenas nessa pag e puzzlePage-->
    <style>
    body{
      overflow-x: hidden;
    }
    #titulo{
      margin-top: 2% !important;
    }
  </style>
  <title><?php echo $nome . " - $nivel" ?></title>
</head>

<body>
  <!-- Navbar -->
  <?php include "../Includes/navBar.html";
  include "../Includes/compartilhar.php"
  ?>

  <div id="mae">
    <?php include "../Includes/breadCrumbs.php" ?>
    <div class="title-grey-normal mt-5 ">
      <?php echo $nome ?>
    </div>
    <div class="subtitle-grey-normal mb-5">
      Nível: <span style=<?php echo "color:$nivelCor" ?>> <?php echo $nivel ?> </span>
    </div>
    <link rel="stylesheet" href="../CSS/styleQuebraCabeca.css">
    <div class="rotacionar">
      Por favor, rotacione o celular :)
      <img src="../SVGs/rotacionar.svg" alt="">
    </div>
    <div class="intesercaoOlho">
      <?php
      if ($nivel === "Noob" || $nivel === "Good") {
        echo "   <div class=\"olhoFechado\"> 
        <i class=\"material-icons\">remove_red_eye</i>
        </div>";
      }
      ?>

      <div class="retangle mb-5">

        <?php include "../Includes/quebraCabeca.html" ?>
        <img src="../Icons/start-icon.svg">

      </div>
      <?php
      if ($nivel === "Noob" || $nivel === "Good") {
        echo "   <div class=\"olhoFechado\"> 
        <i class=\"material-icons\">remove_red_eye</i>
        </div>";
      }
      ?>
    </div>
    <div id='cronometroAjuste'>

      <div class="cronometro">
        <span id="minutos">00</span>:<span id="segundos">00</span>
      </div>

    </div>

  </div>
  <div class="divPrincipal">
    <?php
    $tituloPrincipalGatilho = "Jogue Também!";
    // Informações necessárias para o funcionamento adequado do Random1 e 2(quadrado que contem informações sobre os jogos que o sistema oferece ao usuário). As váriaveis se autoexplicam, talvez dataID possa causar confusão, mas ela é, nada mais, do que o valor que será colocado no 'data-id=', você pode ver isso no include gatilhoparaoutrapag-leia-tambem, desculpem pelo norme gigante.
    $tituloRandom1 = $sorteioObras[$sorteado1Obra][0];
    $textoRandom1  = "Em quanto tempo você consegue completar? Em menos de
         <span>" . $valoresSorteio[$valorSorteado] . "</span>?";
    $dataID1       = $sorteioObras[$sorteado1Obra][1];
    $botao1        = "Bem antes...";
    $icon1         = "url(../Icons/broken_image-24px.svg)";

    //  Aqui a mesma coisa, há presença do $dataNivel é necessária, pois senão não seria possivel saber o nível que o usuário será redirecionado, entretanto pode ser nula, em outra páginas você poderá ver isso.
    $tituloRandom2   = $sorteioObras[$sorteado2Obra][0];
    $textoRandom2    = "Você encara jogar no nível <br /><b>" . $niveisSorteio[$valorNivel] . "</b>? Eu aposto um cookie,
         aceita?";
    $dataID2         = $sorteioObras[$sorteado2Obra][1];
    $dataNivel       = $niveisSorteio[$valorNivel];
    $botao2          = "Sim!";
    $icon2           = "url(../Icons/filter_b_and_w-24px.svg)";

    include '../Includes/gatilhoparaoutrapag-leia-tambem.php' ?>

  </div>
  <div id="divSegunda">
    <div class="title-grey-normal">Descrição</div>
    <div class="descricao mt-5">
      <?= $par1 ?>
    </div>
    <div class="mt-5 mb-5 imagemDescricao">
      <img src=<?= $imgD ?> alt="">
    </div>
    <div class="descricao">
      <?= $par2 ?>
    </div>
  </div>
  <div id="divTerciaria">
    <?php include "../Includes/videoDescritivo.php" ?>
  </div>
  <?php include "../Includes/footer.html" ?>
  <!-- Button trigger modal -->
  <button style='display:none' type="button" id='resultadoBTN' class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Você<span id="anuncio"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="resultado"></div>
          <div id="imgResP">
            <img id="imgRes" />
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <?php include "../Includes/opcoesNiveis.php"; ?>
  <!--Extensões de Scripts, como JQUERY-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script>
    var tempo, tempoNoob
  </script>

  <!-- Cronômetro -->
  <script src="../JS/cronometro.js"></script>
  <script src="../JS/quebracabeca.js"></script>


  <input type="hidden" value=<?= $srcA ?>>
  <!-- Imagens Puzzle -->
  <script>
    var nomeImagem = $("input[type=hidden]").val(),
      url = "url(" + nomeImagem + ")",
      infor = '',
      sup,
      nivel = document.cookie


    nivel = nivel.split(";")
    nivel.forEach((c) => {
      let sub, key = c.split('=')
      sub = key[0].trim()
      if (sub === "nivel") {
        sup = key[1].trim()
      }
    })

    nivel = sup

    // Níveis noob, good, pro, god

    $("#grade").children().css("--backgroundUrlJogo", url)

    if (nivel === "Noob" || nivel === "Good") {
      var width = document.getElementsByClassName('retangle').width
      $(".retangle").css({
        "background-repeat": "no-repeat",
        "background-image": url,
        "background-size": "contain",
        'background-position': "center"
      })
    }

    // Botões 'Jogue Também'

    var primeiro = $(".botaoEnviarPequeno").eq(0),
      segundo = $(".botaoEnviarPequeno").eq(1)
    //  Primeiro
    $(primeiro).click(() => {
      $("#escolheNivel").trigger("click")
    })
    var recOb = 0,
      botao = "#botaoEnviarPequeno",
      conf1 = 0;
    // Segundo
    $(segundo).click(() => {
      var id = $(segundo).attr("data-id"),
        nivel = $(segundo).attr("data-nivel"),
        recOb = 1
      // Nivel da obra
      document.cookie = "nivel = " + nivel
      // o Id da Obra
      document.cookie = "idObr = " + id
      // Se vem de alguma recomendação (jogue também)
      document.cookie = "recOb = " + recOb
      // Redirecionar Para Página PuzzleGame
      window.location.href = "puzzleGame.php"
    })
  </script>
  <!-- Primeiro -->
  <script src='../JS/escolhaNivel.js'></script>

  <!-- Aparecer e desaparecer menu -->
  <script src="../JS/aparecerMenuSmartphone.js"></script>


    <!-- Scripts JS -->
    <?php include "../Includes/scripts.html" ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
 	  <!-- Link para CSS do site -->
     <?php include "../Includes/linksCSSinicio.html" ?>
    <!-- Link para css das Bibliotecas -->
      <link rel='stylesheet' href="../Library/treant-js-master/style.css">
  <title>Arvore</title>
</head>

<body>
  <?php include "../Includes/navBar.html" ?>
  <div class="pt-15" id='mae'>
    <div class="title-grey-normal">
      Mapa do Site
    </div>
    <div>
    <?php include "../Includes/simboloMaior.html" ?>
    </div>
  </div>
  <div class="divPrincipal">

    <div id="tree-simple" class='noOver' >
    
 
     </div>
    </div>
  <!-- Redireciona -->

  <div  id="retangulo"> 
    <div id="content">
      Clique aqui para acessar essa página :)
    </div>
    <div id="seta"></div>
  </div>
  <!-- Links Para Biblioteca e JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
    <script src='../Library/treant-js-master/Treant.js'></script>
    <script src='../Library/treant-js-master/vendor/raphael.js'></script>
    <script src='../Library/treant-js-master/vendor/jquery.easing.js'></script>
    <script src="../JS/ajudaArvore.js"></script>

    <!-- Tooltip -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js'></script>
    <script>
    // Chamando Função
      var chart = new Treant(simple_chart_config, $, );
    
  </script>
</body>

</html>
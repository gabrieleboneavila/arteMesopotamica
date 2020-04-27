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
  <title>Mapa</title>
</head>

<body>
  <?php include "../Includes/navBar.html" ?>
  <div id='mae'>
    <?php
    $bread3 = "Mapa";
    $bread2 = [["Ajuda", "ajudaPage.php"]];
    include "../Includes/breadCrumbs.php" ?>
    <div class='mt-10 mb-5' id='imagem'>
      <?php include "../Icons/map.svg" ?>
    </div>
    <div class="title-grey-normal">
      Mapa do Site
    </div>
    <div>
      <?php include "../Includes/simboloMaior.html" ?>
    </div>
  </div>
  <div class="divPrincipal">

    <div id="tree-simple" class='noOver'>


    </div>
  </div>
  <!-- Redireciona -->



  <!-- MODAL -->
  <button id="redi" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div>
          <div>
            Você será redirecionado para: <span id="local"></span>
          </div>
          <div class="text-center"> Em: <div id='seg'> </div>
          </div>
          <div id='btnP'>
            <div class="btnCancela">Cancelar</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "../Includes/footer.html" ?>
  <!-- Links Para Biblioteca e JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src='../Library/treant-js-master/Treant.js'></script>
  <script src='../Library/treant-js-master/vendor/raphael.js'></script>
  <script src='../Library/treant-js-master/vendor/jquery.easing.js'></script>
  <script src="../JS/ajudaArvore.js"></script>

  <!-- Tooltip -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js'></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    // Chamando Função
    var chart = new Treant(simple_chart_config, $, );
  </script>

  <!-- Smartphone -->
  <script src='../JS/aparecerMenuSmartphone.js'></script>
  <!-- Scripts JS -->
  <?php include "../Includes/scripts.html" ?>
</body>

</html>
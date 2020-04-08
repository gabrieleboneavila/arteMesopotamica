<link href='../CSS/compartilhar.css' rel="stylesheet">

<?php #data-conf === codificacao, para saber qual link compartilhar 
?>

<div data-toggle="tooltip" data-placement="top"   title="Clique Para Compartilhar"  data-conf=<?= $compa ?> id='compartilhar'>
  <div>
    <?php include "../Icons/share-black-18dp.svg" ?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js'></script>
<script src='../JS/compartilhar.js'></script>
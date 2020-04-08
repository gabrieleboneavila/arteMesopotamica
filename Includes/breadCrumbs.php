<div class="mt-10 breadCrumbs">
  <div id="bread1"><a href='index.php'>Home</a></div>
  <?php
  if (count($bread2) > 2) {
    echo "<div class=\"bread2\">...</div>";
    $cont1 = count($bread2);
  }
  if (count($bread2) !== 0) {

    foreach ($bread2 as $value) {
      if (--$cont1 < 2) {
        echo "<div class=\"bread2\"><a href=${value[1]}>${value[0]}</a></div>";
      }
    }
  } ?>

  <div id="bread3">
    <?php $qtdeLetra = str_split($bread3);
    $cont = 0;
    $palavra = "";
    foreach ($qtdeLetra as $letra) {
      if ($cont <= 6 || count($qtdeLetra) == 7) {
        $palavra .= $letra;
      } else {
        $palavra .= "...";
        break;
      }
      $cont++;
    }
    echo $palavra;
    ?>
  </div>
</div>
<div class="mt-10 breadCrumbs">
  <a id="bread1" href='index.php'> Home </a>
  <?php
  if (!(isset($cont1))) {
    $cont1 = 0;
  }
  if (isset($bread2)) {

    foreach ($bread2 as $value) {
      if (--$cont1 < 2) {
        echo "<a class=\"bread2\" href=${value[1]}>${value[0]}</a>";
      }
    }
  }
  ?>

  <div id="bread3">
    <?php echo $bread3

    ?>
  </div>
</div>
<?php // Pegando URL
  function UrlAtual(){
    $dominio= $_SERVER['HTTP_HOST'];
    $verifica = explode("?",$_SERVER['REQUEST_URI']);
    $url = "http://" . $dominio. $verifica[0];   
    return $url;
    }

    ?>
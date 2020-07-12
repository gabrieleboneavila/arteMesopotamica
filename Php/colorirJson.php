<?php 
 // Pegando Dados JSON
 $data = file_get_contents("../JSON/desenhos.json");

 print_r(json_decode($data,true));

?>
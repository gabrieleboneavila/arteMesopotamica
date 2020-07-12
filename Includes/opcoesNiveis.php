 <!-- Button trigger modal -->
 <button type="button" id='escolheNivel' style='display:none' class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
   s
 </button>

 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="titulo"></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div id="escolhaNivel">Escolha um Nível</div>
         <?php
          $niveis = [
            ['nome' => "Noob", "info" => "Se você nunca viu essa obra esse é o nível perfeito!", "star" => 1],
            ['nome' => "Good", "info" => "A dificuldade começa a aumentar, tá preparado?", "star" => 2],
            ['nome' => "Pro", "info" => "Somente entre aqui caso tenha certeza que sairá...", "star" => 4],
            ['nome' => "God", "info" => "Muito cuidado terras inábitas a caminho... Eu avisei!", "star" => 5]
          ];
          foreach ($niveis as $nivel) {
            echo "<div class='niveis'>
                    <div class='botaoNivel'>${nivel['nome']}</div>
                    <div class='infoNivel'> ${nivel['info']}</div>
                    <div class= 'estrelasNivel'>
                 ";
            $estrelas = $nivel['star'];
            for ($cont = 1; $cont < 6; $cont++) {
              $class = "";
              $cont > $estrelas ? $class = "estrelaVazia" : $class = "estrelaCheia";

              echo "<span class='estrelaPeq $class'></span>";
              if(!(isset($estrela))) $estrela = 0; 
              $estrela !== 0 ? $estrela-- : $estrela;
            }
            echo "
                </div>     
              </div>
           ";
          }
          ?>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
       </div>
     </div>
   </div>
 </div>
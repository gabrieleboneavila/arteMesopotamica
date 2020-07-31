<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="  https://printjs-4de6.kxcdn.com/print.min.css">

<!-- CSS para imprimir -->
<link rel="stylesheet" type="text/css" href="../CSS/Print/style.css" media="print" />

<head>
  <style>
    #print:hover {
      border: 0 !important
    }

    #color-input {
      position: absolute;
      opacity: 0;
    }

    #corEs {
      cursor: pointer
    }

    svg {
      cursor: pointer;
    }

    #pseudo-color-input {
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 100px;
      position: relative;
      z-index: 1;
      cursor: pointer;
    }
  </style>
  <?php include "../Includes/linksCSSinicio.html" ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- Nav -->
  <?php include "../Includes/navBar.html" ?>

  <div id="mae">
    <!-- BreadCrumbs -->
    <?php $bread2 = [["Colorir", "colorirPage.php"]];
    $bread3 = $_COOKIE["colorir"];
    include "../Includes/breadCrumbs.php" ?>
    <div class="title-grey-normal mt-5" id="nome">lll</div>
    
    <div class=" mt-3 alert alert-warning" role="alert">
      Para melhor usabilidade recomendamos o uso de um dispositivo de maior resolução.
    </div>

    <!-- Para escolher a cor que vai pintar -->
    <div id="ferramentas" class="mt-3 mb-3">
      <div id="cores">
        <div id="corEs">
          Escolha uma cor
        </div>
        <input type="color" id="color-input" />
        <label for="color-input" id="pseudo-color-input"></label>
      </div>
      <div id="bgc" class="grey">Background (fundo)</div>
    </div>


    <!-- Onde da load no svg -->
    
    <div id="idt">
      <div data-pan-on-drag data-zoom-on-wheel="max-scale: 1000;" style="
        border: 1px solid #ccc;
        box-shadow: 0 0 8px #aaa;
        width: 1010px;
        height: 600px;
        background-color:white
      " id="img"></div>

    </div>

    <button id="print" class="botaoEnviar">Salvar PDF</button>
  </div>



  <!-- Footer -->
  <?php include "../Includes/footerDark.html" ?>
  <!-- JS e modal -->
  <!-- Scripts basicos -->
  <?php include "../Includes/scripts.html" ?>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- Modal para quando clica em background (fundo) -->
  <?php include "../Includes/modalColorir.html" ?>
  <!-- Deixar nav Responsivel -->
  <script src="../JS/aparecerMenuSmartphone.js"></script>
  <!-- Pan e zoom -->
  <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom-container@0.2.7"></script>
  <!-- Imprimir e pdf -->
  <script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>


  <!-- Código -->
  <script>
    // Para dar zoom e pan
    new MutationObserver(function(mutations) {
      if (window.inputting) {
        delete window.inputting;
      }
    }).observe(document.getElementById("img"), {
      attributes: true,
      attributeFilter: ["data-scale"],
    });
  </script>
  <!-- scroll observation-->
  <script>
    document
      .getElementById("img")
      .addEventListener("scroll", function() {
        console.log({
          scrollLeft: this.scrollLeft,
          scrollTop: this.scrollTop,
        });
      });
  </script>
  <!-- scale observation-->
  <script>
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        console.log("scale:", mutation.target.dataset.scale);
      });
    });

    observer.observe(document.getElementById("img"), {
      attributes: true,
      attributeFilter: ["data-scale"],
    });
    // Acabou
  </script>
  <script>
    // selecionar svg
    setTimeout(() => {
      var svg = document.querySelector("svg");
    })

    // seleciona qual imagem o usuário selecionou nos cookies
    var posi = document.cookie.split(";")
    posi.forEach((e) => {
      var i = e.split('=')
      console.log(i[0])
      if (i[0].trim() === "colorirId") {
        colorir = i[1]
      }
    })
    // essa var se usa dps para colocar o nome do PDF
    var noPdf
    // faz a incrível mágica de selecionar a imagem que nosso lindo usuário queria: WOOOW sensacional
    $.ajax({
      method: "get",
      url: "../JSON/desenhos.json"
    }).done((data) => {
      var info = data[colorir]
      if (info === undefined) {
        window.location = "colorirPage.php"
      }
      // coloca as info nas divs
      noPdf = info.nome
      $("#nome").text(info.nome)
      $("#bread3").text(info.nome)
      $("title").text(info.nome + " - Colorir")
      $("#img").load(info.img);

      // prepara quando o usuário clicar no em algum path (as partes da obras, ex.: a cauda do leão)
      setTimeout(() => {
        $("path").click((e) => {
          var $this = e.target,
            cor = $("#color-input").val()
          $($this).css({
            "fill": cor,
            "stroke": cor
          })
        })
      }, 500)
    })


    // Input Color diferenciado (escolha uma cor)
    $('#color-input').on('change', function() {
      $(this)
        .next('#pseudo-color-input')
        .css('background-color', $(this).val());
    });

    $(() => {
      $('#color-input')
        .next('#pseudo-color-input')
        .css('background-color', $('#color-input').val());
      $("#corEs").click(() => {
        $('#color-input').trigger("click")
      })
    })

    // Quando clica no bgc(background color) 
    $("#bgc").click(() => {
      $("#btnHide").trigger("click")
    })
    $(() => {
      $("path").click((e) => {
        var img = e.target
      })
    })
  </script>

  <script>
    $("#print").click(() => {
      window.print()
    })
  </script>

  <!-- tirar alert dps de 10s -->
  <script>
    setTimeout(()=>{
      $(".alert").css("display", "none")
    },10000)
  </script>
</body>

</html>
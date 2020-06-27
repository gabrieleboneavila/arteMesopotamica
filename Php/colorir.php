<!DOCTYPE html>
<html lang="en">

<head>
  <style>
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

    <!-- Para escolher a cor que vai pintar -->
    <div id="ferramentas" class="mt-5 mb-3">
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
    <div class="svgImg" id="svgImg">
      <div data-pan-on-drag data-zoom-on-wheel="max-scale: 1000;" id="img"></div>


    </div>

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
  <!-- Pan e -->

 
  <!-- Código -->
  <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom-container@0.2.7"></script>
    <script>

      new MutationObserver(function (mutations) {
        if (window.inputting) {
          delete window.inputting;
        } else {
          mutations.forEach(function (mutation) {
            document.getElementById("scale").value = (
              Math.round(
                svgPanZoomContainer.getScale(mutation.target) * 10000
              ) / 100
            ).toFixed(2);
          });
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
        .addEventListener("scroll", function () {
          console.log({
            scrollLeft: this.scrollLeft,
            scrollTop: this.scrollTop,
          });
        });
    </script>
    <!-- scale observation-->
    <script>
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          console.log("scale:", mutation.target.dataset.scale);
        });
      });

      observer.observe(document.getElementById("img"), {
        attributes: true,
        attributeFilter: ["data-scale"],
      });


    </script>
  <script>
    setTimeout(() => {
      var svg = document.querySelector("svg");
    })

    var colorir = "leao";
    var posi = document.cookie.split(";")
    posi.forEach((e) => {
      var i = e.split('=')
      console.log(i[0])
      if (i[0].trim() === "colorirId") {
        colorir = i[1]
      }
    })

    $.ajax({
      method: "get",
      url: "../JSON/desenhos.json"
    }).done((data) => {
      var info = data[colorir]
      if (info === undefined) {
        window.location = "colorirPage.php"
      }
      console.log(info)
      $("#nome").text(info.nome)
      $("#bread3").text(info.nome)
      $("title").text(info.nome + " - Colorir")
      $("#img").load(info.img);

      setTimeout(() => {

        $("path").click((e) => {
          var $this = e.target,
            cor = $("#color-input").val()
          $($this).css({
            "fill": cor,
            "stroke": cor
          })
          $($this).css("zoom", "10%")
        })
      }, 500)
    })


    // Input Color diferente
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
</body>

</html>
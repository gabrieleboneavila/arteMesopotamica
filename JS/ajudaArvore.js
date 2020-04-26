// Vem do json de quiz
var ajuQuiz = [
    {
      innerHTML:
        "<div data-url='ajudaArvore.php' data-url='' class='icon'>Mapa <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-url='ajudaArvore.php' data-url='' class='icon'>Manual <div class='circle'></div></div>",
    }
  ],
  infoQuiz = [
    {
      innerHTML:
        "<div data-id='lb40' data-url='puzzleGame.php' class='icon'>Leão Bab. <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='zu40' data-url='puzzleGame.php' class='icon'>Zig. Ur <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='pb40' data-url='puzzleGame.php' class='icon'>Pla. Burney <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='eg41' data-url='puzzleGame.php' class='icon'>Est. Gudea <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='la40' data-url='puzzleGame.php' class='icon'>Escultura de Lamassu <div class='circle'></div></div>",
    },
  ],
  // Vem do json de artePag
  infoArte = [
    {
      innerHTML:
        "<div data-id='es45' data-url='artContent.php' class='icon'>Esculturas <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='ar45' data-url='artContent.php' class='icon'>Arquitetura <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='zi46' data-url='artContent.php' class='icon'>Zigurates <div class='circle'></div></div>",
    },
    {
      innerHTML:
        "<div data-id='li46' data-url='artContent.php' class='icon'>Literatura <div class='circle'></div></div>",
    },
  ];

// Função para funcionar a árvore
simple_chart_config = {
  chart: {
    container: "#tree-simple",
    hideRootNode: true,
    connectors: {
      type: "step",
      style: {
        "arrow-end": "block-wide-long",
        "stroke-width": 2,
        stroke: "#ffcdab",
      },
    },
    node: {
      collapsable: true,
    },
    animation: {
      nodeAnimation: "easeOutBounce",
      nodeSpeed: 700,
      connectorsAnimation: "bounce",
      connectorsSpeed: 700,
    },
  },

  nodeStructure: {
    text: { name: "." },
    children: [
      {
        HTMLid: "home",
        collapsed: false,
        link: { href: "" },
        HTMLclass: "redireciona",
        innerHTML:
          "<div data-url='index.php' class='icon'>Home <div class='circle'></div></div>",
        children: [
          {
            innerHTML:
              "<div data-url='artPage.php'class='icon'>Arte <div class='circle'></div></div>",

            stackChildren: true,
            collapsed: true,
            HTMLclass: "redireciona",
            children: infoArte,
            HTMLid: "confirma3",
          },
          {
            HTMLclass: "redireciona",
            text: { nome: "Quiz" },
            stackChildren: true,
            innerHTML:
              "<div data-url='quizPage.php' class='icon'>Quiz <div class='circle'></div></div>",
            collapsed: true,
            HTMLid: "confirma2",
            children: infoQuiz,
          },
          {
            collapsed: true,
            stackChildren: true,
            HTMLclass: "redireciona",
            HTMLid: "confirma1",
            innerHTML:
              "<div data-url='ajudaPage.php' class='icon'>Ajuda <div class='circle'></div></div>",
            children: ajuQuiz,
          },
        ],
      },
    ],
  },
};
$(() => {
  // Váriaveis globais
  var interval,
    url,
    cookie = false;

  $(".circle").click((e) => {
    // Criando "this"
    var $this = e.target,
      local = $($this).parent().text();

    // Analisando se o círculo clicado possui um data-id(dai vai para ou os jogos ou os conteúdos)
    if ($($this).parent().attr("data-id")) {
      cookie = $($this).parent().attr("data-id");
    }

    url = $($this).parent().attr("data-url");

    //Especificando local que será redirecionado
    $("#local").text(local);

    // Função dos Segundos
    var seg = 5;
    $("#seg").text(5 + "s");

    // Segundos para redirecionar
    interval = setInterval(() => {
      $("#seg").text(--seg + "s");

      // Verificando se passaram 5
      if (seg === 0) {
        redireciona();
      }
    }, 1000);

    // Chamando a Modal
    $("#redi").trigger("click");
  });

  $("");

  // Modal fade
  $(".bd-example-modal-sm").click(() => {
    clearInterval(interval);
  });

  // Botão de cancelamento
  $(".btnCancela").click(() => {
    clearInterval(interval);
    $(".bd-example-modal-sm ").trigger("click");
  });

  // Redirecionar antes(Se pessoa clicar antes no nome da página (local))
  $("#local").click(() => {
    redireciona();
  });

  // Função para redirecionar para outra pag
  function redireciona() {
    if (cookie) {
      if (url === "artContent.php") document.cookie = "idArte = " + cookie;
      else {
        document.cookie = "nivel = ?";
        document.cookie = "idObr = " + cookie;
      }
    }
    window.location = url;
  }

  // Quando clica em home para não dar bugs
  setInterval(() => {
    // Confirmar se o home tem que ter 1px (senão ele fica "caído" no meio da pag)
    var home = document.getElementById("home")
    home.matches(".collapsed") ? $(home).css("top","1px") : home
  
    $("#confirma2").click(()=>{
      $(".collapse-switch").eq(3).trigger("click")
    })

  }, 100);
});

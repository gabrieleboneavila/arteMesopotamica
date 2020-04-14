
// Vem do json de quiz
var infoQuiz = [{ text: { nome: 'Leão da Babilônia'},HTMLclass: "redireciona",},{ text: { nome: 'Zigurate de Ur'},HTMLclass: "redireciona",},{ text: { nome: 'Placa de Burney'},HTMLclass: "redireciona",},{ text: { nome: 'Estátua de Gudea'},HTMLclass: "redireciona",},{ text: { nome: 'Escultura de Lamassu'},HTMLclass: "redireciona",}],
// Vem do json de artePag
infoArte= [{ text: { nome: 'Esculturas'},HTMLclass: "redireciona",},{ text: { nome: 'Arquitetura'},HTMLclass: "redireciona",},{ text: { nome: 'Zigurates'},HTMLclass: "redireciona",},{ text: { nome: 'Literatura'},HTMLclass: "redireciona",}]

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

        collapsed: true,
        link : {href: ""},
        HTMLclass: "redireciona",
        HTMLid: "hay",

        text: { nome: "Home" },
        children: [
          {
            text: { nome: "Arte" },
            stackChildren : true,
            collapsed: true,
            HTMLclass: "redireciona",
            children: infoArte,
            
          },
          {
            HTMLclass: "redireciona",
            text: { nome: "Quiz"},
            stackChildren : true,
            collapsed: true,
            children: infoQuiz,
          },
          {
            collapsed: true,
            HTMLclass: "redireciona",
            text: { nome: "Ajuda" },
          },
        ],
      },
    ],
  },
};

// Redireciona
$(()=>{
var reta = $("#retangulo")
var $this, limpar 

$("#tree-simple").append(reta)
$(".redireciona").mouseover((e)=>{
   $this = e.target
  // Caso o mouse passe por cima do collapse, senão tudo (left, top,etc) fica em 1px e isso buga ;( assim não buga :)
  if($(e.target).attr("class") === "collapse-switch" )
  {
    $this = $(e.target).parent()
  }
  
  // Pegando outros valores para atribuir ao #retangulo e o parseInt para tirar o 'px'
  var  topVer = parseInt($($this).css("top")) , left = parseInt($($this).css("left"))

  // Ajustando valores par o #retangulo não ficar sobre os outros conteúdos
  left-=50
  topVer-=80
  // Verificando se não é auto (senão buga)
  if(topVer !== 'auto')
  {
    $("#retangulo").css({
      "top":topVer+'px',
      "animation": "aparece 1s ",
      "left":left+'px',
      "display":"flex"
    })
  }

})
// Mouse Out
$(".redireciona").mouseout(()=>{
  limpar = setInterval(()=>{
    $("#retangulo").css("animation","desaparece 1s  ")
  },1000)
})
})


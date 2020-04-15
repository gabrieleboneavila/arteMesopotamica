
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
var $this, limpar,verifica,completo 

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
  left-=30
  topVer-=75
  // Verificando se não é auto (senão buga)
  if(topVer !== 'auto')
  {
    verifica = false; completo = true
    $("#retangulo").css({
      "top":topVer+'px',
      "animation": "aparece 0.2s forwards ",
      "left":left+'px',
      "display":"flex"
    })
    setTimeout(()=>{
      $("#retangulo").css({
      " display":"flex",
        "animation": "",
      })
    },1000)
  }

})
// Mouse Out

if(completo){
  setTimeout(()=>{
  if(!verifica)
  {
    console.log("foi")
    $("#retangulo").css({
      "top":topVer+'px',
      "animation": "desaparece 0.2s backwards ",
      "left":left+'px',
      "display":"flex"
    })
  }
},3000)
  completo = false
}
$("#retangulo").mouseover(()=>{
    verifica = true
    console.log("gayyyy")
})

})


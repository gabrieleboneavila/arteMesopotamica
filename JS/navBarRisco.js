// Saber em qual página o risco (after do li) tem que já ficar posicionado
  // Caso for add aqui lembre-se: ['id_do_componente', 'resto são as pg'] obs.: id deve existir na navBar.html
const pags= [["arte",'artPage.php', 'artContent.php'],["quiz", "quizPage.php","puzzlePage.php","puzzleGame.php"], ["colorir","colorirPage.php", "colorir.php"]]


// Verificando qual pg é
var atual = location.href
// Tirando o http://
var nome = atual.split("http://")
// Selecionando apenas o nome da pg
nome = nome[1].split("/")[2]

// Variavel para o nome do componente(Arte, colorir...)
var comp

// Vendo a qual componente ela faz parte
pags.forEach((e)=>{
  e.forEach((i)=>{
    if(i === nome){
      comp = e[0]
    }
  })
})

// Adicionado classe para o comp
$("#"+comp).addClass("risco")
$("#"+comp).removeClass("liNav")

  // id da obra
  var idObr

  $(botao).click((e)=>{
    var botaoInfo = $(e.currentTarget),
        id = $(botaoInfo).attr("id")
        conf1===1 ?nome = $(botaoInfo).parent().find('div').text():nome = $(botaoInfo).parent().find('.tituloCartaoRandom').text()
        
        nome = nome.trim()

    $("#titulo").text(nome)
    idObr = $(e.currentTarget).attr("data-id")
    $("#escolheNivel").trigger('click')

    
  })
    $(".botaoNivel").click((e)=>{
        e = e.currentTarget;
        // Nivel da obra
        document.cookie = "nivel = "+$(e).text()
        // o Id da Obra
        document.cookie = "idObr = "+idObr
        // Se vem de alguma recomendação (jogue também)
        document.cookie = "recOb = "+recOb
        // Redirecionar Para Página PuzzleGame
        window.location.href="puzzleGame.php"
    })
    
    //Quando clica na imagem redirecionar para o botão 

    $(".imgPuzzle").click((e)=>{
      var $this = e.target
      $($this).parent().find("button").trigger("click")
    })
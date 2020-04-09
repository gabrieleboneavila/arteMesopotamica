setInterval(() => {
   if(window.innerWidth>680)
  {
    $("#responseDiv").css("display","none")
  }
}, 200);
var response=	$("#responseDiv")

$("#menu").click(function(){
  $(response).css("display",'flex')
  $("#contentDiv").css({
    "animation-name":"animacaoEntrada",
    "animation-duration":"2s"
  })
  $("#menu").css({
    "animation-name":"animacaoMenu",
    "animation-duration":"1s"
  })
  setTimeout(() => {
     $("#menu").css({
    "animation-name":"",
    
 
   })
  
  }, 2000);
})
$("#botaoSVG, #darkNav").click(()=>{
  $("#darkNav").css("display","none")
  saida()
})

function saida(){
  $("#contentDiv").css({
    "animation-name":"animacaoSaida",
    "animation-duration":"2s",
    "animation-fill-mode":'forwards'
  })

  $("#botaoSVG").css({
    "animation-name":"animacaoX",
    "animation-duration":"0.25s",
   })
   
   $("#menu").css({
    "animation-name":"animacaoMenuInvertida",
    "animation-duration":"3s"
  })
  setTimeout(() => {
    $(response).css("display",'none')
    $("#botaoSVG").css({
    "animation-name":"",})
    $("#menu").css({
    "animation-name":"",
   })
   $("#darkNav").css("display","flex")

  }, 2000);

}
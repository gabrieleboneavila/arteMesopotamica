// Quando Clica no ver ZIGURATE
$("#aparecerFlecha").click(()=>{
  $(".flecha").css("display",'block')
  
  setTimeout(()=>{
    $(".flecha").css("display",'none')
  },4000)


})
$("#aparecerFlecha").click(()=>{
$("html").animate({scrollTop:0},1000)

})

$(".botaoEnviar").eq(1).click((event)=>{
  window.location = "quizPage.php";
})

$(".botaoEnviar").eq(0).click((event)=>{
  window.location = "artPage.php";
})


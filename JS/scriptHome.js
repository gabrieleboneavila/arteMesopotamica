// Quando Clica no ver ZIGURATE
$("#aparecerFlecha").click(()=>{
  $(".flecha").css("display",'block')
  
  setTimeout(()=>{
    $(".flecha").css("display",'none')
  },4000)


})
$("#aparecerFlecha").click(()=>{

$("html").animate({scrollTop:0},1000)
$(".desaparece").attr("id",'null')
setTimeout(()=>{
  $(".desaparece").attr("id",'topActive')
  $("#topActive").css({ display: "none" });
},1000)
})

$(".botaoEnviar").eq(1).click((event)=>{
  window.location = "quizPage.php";
})

$(".botaoEnviar").eq(0).click((event)=>{
  window.location = "artPage.php";
})



$(".botaoEnviar").eq(2).click((event)=>{
  window.location = "colorirPage.php";
})

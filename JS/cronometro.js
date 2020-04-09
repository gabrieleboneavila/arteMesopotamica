// Cor do Span de nível com selection

var link = $("span",".subtitle-grey-normal"), cor = $(link).css("color")
$(link).css("--corSpan",cor)
// Cronometro

var segundos =  Math.round($("#segundos").text()),
    minutos = Math.round($("#minutos").text())
  $(".retangle").find("img").click(()=>{
    $(".retangle").find("img").css("display",'none')
    $("#grade").css("display",'flex')
    $(".retangle").css({
 
      "background-image":"",
 })
      if(nivel !== "Pro" && nivel !== "God")
      {
        tempoNoob = setInterval(()=>{

         if(segundos===59)
         {
          minutos++
          segundos = 0
        } 
         else segundos++
      
        segundos<10 ? segundosP="0"+segundos : segundosP = segundos
        minutos<10 ? minutosP="0"+minutos : minutosP = minutos
      
        $("#segundos").html(segundosP);
        $("#minutos").html(minutosP);
      },1000)
    }

    else
    { 
      var seg = $("#segundos"),
          min= $("#minutos")
      $(seg).html("00");
      $(min).html("01");
      
      var segP = 0, minP = 1
      tempo = setInterval(()=>{
        if(minP === 1)
        {
          minP = 0
          segP = 59
        }
        else if(segP !== 0){
          segP--
        }
        else{
          clearInterval(tempo)
          $("#anuncio").text(" Perdeu!")
          console.log(cookie)
		      let resul = cookie==0 ? "" : " Além disso, você me deve um cookie, por favor me dê um :)"

          $('#resultado').text("Você deixou com que passase um minuto! Tente novamente :)"+resul)
          $("#grade").css("display",'none')
          $("#resultadoBTN").trigger("click")
          $(".retangle").find("img").removeAttr('src').addClass("refreshTamanho").attr("src",'../Icons/refresh-24px.svg').css({"display":'block'})
		      $("#imgRes").attr("src",cookie==0 ?"../SVGs/perdedor.svg" : "../SVGs/cookie.svg");

          minutos = 0
          segundos = 0 
          embaralhar(100)
          

         
        }
        // Colocar 0 na frente do segundo ou minuto, quando for menor
        segP<10 ? segP2="0"+segP : segP2 = segP
        minP<10 ? minP2="0"+minP : minP2 = minP
        
        $(seg).html(segP2)
        $(min).html(minP2)
        


    },1000)
    }
$(".olhoFechado").click(()=>{
  $(".olhoFechado").css({
    "animation":""
  })
  $(".cronometro").css("animation","")
    if($(".retangle").css("background-image")==="none")
    { 
      $(".retangle").css("background-image",url)
      $("#grade").css("opacity",'0')
      $(".olhoFechado").find("i").html("visibility_off")
       
    }

  
  else
  { 
    $(".retangle").css("background-image","")
      $("#grade").css("opacity",'1')
      $(".olhoFechado").find("i").html("remove_red_eye")
 
  }

})
})
 


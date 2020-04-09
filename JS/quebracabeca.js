const grade=document.getElementById("grade");
var tamanhoPeca=50;
for (var i=0;i<4;i++){
	for(var j=0;j<6;j++){
		var novaPeca=document.createElement("div");
		novaPeca.id="x"+j+"y"+i;
		novaPeca.style.top=i*tamanhoPeca+"px";
		novaPeca.style.left=j*tamanhoPeca+"px";
		novaPeca.style.backgroundPositionX=((j*25/(6-1))*100)+"%";
		novaPeca.style.backgroundPositionY=((i*25/(4-1))*100)+"%";
		novaPeca.setAttribute("onclick","clicarPeca(this)");
		grade.appendChild(novaPeca)
	}
}
var escolhido1=null;
var escolhido2=null;
function clicarPeca(argElemento){
	if(escolhido1==null){
		escolhido1=argElemento;
	}else if(escolhido2==null){
		escolhido2=argElemento;
		trocarPeca();
	}
}

function embaralhar(argInteracoes){
	for(var i=0; i<argInteracoes;i++){
		var escolhido1X=0;
		var escolhido1Y=0;
		var escolhido2X=0;
		var escolhido2Y=0;
		
		while(escolhido1X==escolhido2X && escolhido1Y==escolhido2Y){
			escolhido1X=Math.round(Math.random()*(6-1));
			escolhido1Y=Math.round(Math.random()*(4-1));
			
			escolhido2X=Math.round(Math.random()*(6-1));
			escolhido2Y=Math.round(Math.random()*(4-1));
		}
		escolhido1=document.getElementById("x"+escolhido1X+"y"+escolhido1Y)
		escolhido2=document.getElementById("x"+escolhido2X+"y"+escolhido2Y)
		trocarPeca();
	}
}

function trocarPeca(){
	var escolhidoTrocadoTop=escolhido1.style.top;
	var escolhidoTrocadoLeft=escolhido1.style.left;
	escolhido1.style.top=escolhido2.style.top;
	escolhido1.style.left=escolhido2.style.left;
	escolhido2.style.top=escolhidoTrocadoTop;
	escolhido2.style.left=escolhidoTrocadoLeft;
	escolhido1=null;
	escolhido2=null;
	validar();
}
var cookie = document.cookie
cookie = cookie.split(";")

for(let a=0; a<cookie.length; a++)
{
	var valorCookie  = cookie[a].split("=");
	if(valorCookie[0].trim() == "recOb")
	{
		cookie = valorCookie[1].trim("");
		break
	}
}
let resul = cookie==0 ? "" : " Além disso, você ganhou um cookie! Aproveite!"
function validar(){
	var quebraCabecaOK=true;
	for(var i=0;i<4;i++){
		for(var j=0;j<6;j++){
			var posicaoXesperada=j*tamanhoPeca+"px";
			var posicaoYesperada=i*tamanhoPeca+"px";
			
			var pecaVerificada=document.getElementById("x"+j+"y"+i);
			if(pecaVerificada.style.left!=posicaoXesperada || pecaVerificada.style.top!=posicaoYesperada){
				quebraCabecaOK=false;
			}
		}
	}
	var frase, addMin

	if(quebraCabecaOK){
		if(nivel=="Good" || nivel=="Noob")
		{	
			minutos !== 0 ? addMin = minutos+" minuto(s) e" : addMin = ''
			minutos < 2 ? $comp = " apenas" : $comp = "";
			frase = "em"+$comp+" "+addMin+" "+segundos+" segundos"
		}else{
			frase = "em menos de um minuto! Você é muito bom";
		}
		clearInterval(tempo)
		clearInterval(tempoNoob)
	
		$("#anuncio").text(" Ganhou!")
		let resul = cookie==0 ? "" : " Além disso, você ganhou um cookie! Aproveite!"
		$('#resultado').text("Você completou o puzzle "+frase+"! Parabéns!" + resul)
		$("#imgRes").attr("src",cookie==0 ?"../SVGs/primeiro.svg" : "../SVGs/cookie.svg");
		$("#grade").css("display",'none')
		$("#resultadoBTN").trigger("click")
		$(".retangle").find("img").removeAttr('src')
		$(".retangle").find("img").addClass("refreshTamanho").attr("src",'../Icons/refresh-24px.svg').css("display",'block')
		minutos = 0
		segundos = 0 
		embaralhar(100)
	 
	}
}
embaralhar(100);
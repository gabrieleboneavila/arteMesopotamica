var x = true;

$(() => {
  var div =
    "<div class='desaparece' id='topActive'> <img src='../Icons/keyboard_white_arrow_down-24px.svg'/> </div>";
  $("body").append(div);

  //TopActive aparecer e desaparecer
  top();

  $(window).scroll(() => {
    top();
  });

  function top() {
    var height = $(window).scrollTop();
    if (height < 300) {
      var y;
      if (x) {
        $("#topActive").css({ display: "none" });
      } else $("#topActive").css({ animation: "topDesaparece 1s  forwards" });
      x = false;
    } else if (height > 300) {
      $("#topActive").css({
        animation: "topAparece 1s backwards",
        display: "flex",
      });
    }
  }

  // Quando clica no topActive
  $("#topActive").click(() => {
    $("html").animate({scrollTop:0},1000)  });
});

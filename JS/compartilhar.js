$('#compartilhar').click((e)=>{
  
  var $this=$('#compartilhar'), comp = $this.attr("data-conf"), input = document.createElement('input');
  input.value = comp
  $('body').append(input);
  input.select()
  document.execCommand('copy');
  $($this).trigger('mouseout')
  $($this).attr('data-original-title',"Copiou!")
  $($this).trigger('mouseover')
  $($this).mouseout(()=>{
    setTimeout(()=>{
      $($this).attr('data-original-title',"Clique para Copiar!")
    },200)

  })
  
})

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
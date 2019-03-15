// Commpteur de checkbox
  $(document).ready(function(){
    $('.chkbx').click(function(){
      var text="";
      $('.chkbx:checked').each(function(){
        text+=$(this).val()+ ',';
      });
      text=text.substring(0,text.length-1);
      $('#selectedtext').val(text);
      var count = $("[type='checkbox']:checked").length;
      $('#count').val($("[type='checkbox']:checked").length);
    });
  });

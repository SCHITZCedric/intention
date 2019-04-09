$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){

    // Checkbox click
    $(".hidecol").click(function(){

        var id = this.id;
        var splitid = id.split("_");
        var colno = splitid[1];
        var checked = true;

        // Checking Checkbox state
        if($(this).is(":checked")){
            checked = true;
        }else{
            checked = false;
        }
        setTimeout(function(){
            if(checked){
                $('#emp_table td:nth-child('+colno+')').hide();
                $('#emp_table th:nth-child('+colno+')').hide();
            } else{
                $('#emp_table td:nth-child('+colno+')').show();
                $('#emp_table th:nth-child('+colno+')').show();
            }
            // Hiding column

        }, 1500);

    });
});

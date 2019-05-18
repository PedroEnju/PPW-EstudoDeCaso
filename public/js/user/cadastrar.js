$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formLogin").fadeIn();
        $(this).remove();
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });

    function toast(msg = "", tipo = "info") {
        Toast.fire({
            type: tipo,
            title: msg
        });
    }

    $("#btn_cadastrar").on("click", function(){
      
        return;
    });

    $(document).keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $("#btn_cadastrar").click();
        }
    });

});
$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formEstado").fadeIn();
        $(this).remove();
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false
    });

    function toast(msg = "", tipo = "info", timer = 2000) {
        Toast.fire({
            type: tipo,
            title: msg,
            timer: timer
        });
    }

    function keyClick(e)
    {
        var keycode = (e.keyCode ? e.keyCode : e.which);
        if(keycode == '13'){
            if($("#btn_cadastrar").prop("disabled") == false)
                $("#btn_cadastrar").click();
        }
    }

    $("#nomeEstado").on("keypress", function(e){
        keyClick(e);
    });

    $("#uf").on("keypress", function(e){
        keyClick(e);
    });

    $("#btn_cadastrar").on("click", function(){
        
        $(this).attr("disabled", true);0
        
        var nomeEstado  = $("#nomeEstado").val().trim();
        var uf          = $("#uf").val().trim();

        var msg = "";
        if(typeof nomeEstado == "undefined" || nomeEstado.length == 0) {
            msg = "Nome do Estado não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#nomeEstado").focus();
        } else if(typeof uf == "undefined" || uf.length == 0) {
            msg = "UF não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#uf").focus();
        } else if(uf.length != 2) {
            msg = "UF está incorreta!";
            toast(msg, "error", 4000);
            $("#uf").focus();
        } else {
            console.log("AJAAXXXXXXXXXXXXXX");
        }

        $(this).attr("disabled", false);
        return;
    });

});
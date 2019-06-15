$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formUsuario").fadeIn();
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
    
    $("#nomeUsuario").on("keypress", function(e){
        keyClick(e);
    });

    $("#tipoUsuario").on("keypress", function(e){
        keyClick(e);
    });

    $("#btn_salvar").on("click", function(){
        
        $(this).attr("disabled", true);
        

        var id          = $("#idUsuario").val();
        var nomeUsuario = $("#nomeUsuario").val().trim();
        var tipoUsuario = $("#tipoUsuario").val().trim();

        var msg = "";
        if(typeof nomeUsuario == "undefined" || nomeUsuario.length == 0) {
            msg = "Nome do Usuário não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#nomeUsuario").focus();
        } else if(typeof tipoUsuario == "undefined" || tipoUsuario.length == 0) {
            msg = "Tipo do Usuário não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#tipoUsuario").focus();
        } else if(tipoUsuario != "C" && tipoUsuario != "A") {
            msg = "Tipo de Usuário está incorreta!";
            toast(msg, "error", 4000);
            $("#tipoUsuario").focus();
        } else {
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/user/editar",
                dataType: "json",
                data: {
                    "id"            : id,
                    "nomeUsuario"   : nomeUsuario,
                    "tipoUsuario"   : tipoUsuario
                },
                beforeSend: function() {
                    toast("Processando...");
                },
                success: function(json) {
                    if(json["status"] == 1) {
                        toast("Editado com Sucesso", "success");
                        window.location.reload();
                    }
                    else
                        toast("Falha: " + json["error"], "error");
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }

        $(this).attr("disabled", false);
        return;
    });

    $("#btn_voltar").on("click", function(){
        window.history.go(-1);
    });
    
});
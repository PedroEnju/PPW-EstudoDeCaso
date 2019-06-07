$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formLogin").fadeIn();
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

    $("#usuario").on("keypress", function(e){
        keyClick(e);
    });

    $("#senha").on("keypress", function(e){
        keyClick(e);
    });

    $("#senhaConf").on("keypress", function(e){
        keyClick(e);
    });

    $("#btn_cadastrar").on("click", function(){
        
        $(this).attr("disabled", true);
        
        var usuario     = $("#usuario").val().trim();
        var senha       = $("#senha").val().trim();
        var senhaConf   = $("#senhaConf").val().trim();

        var msg = "";
        if(typeof usuario == "undefined" || usuario.length == 0) {
            msg = "Usuário não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#usuario").focus();
        } else if(typeof senha == "undefined" || senha.length == 0) {
            msg = "Senha não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#senha").focus();
        } else if(typeof senhaConf == "undefined" || senhaConf.length == 0) {
            msg = "Confirmação de Senha não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#senhaConf").focus();
        } else if(senha !== senhaConf) {
            msg = "Confirmação de Senha está incorreta!\nPor favor verifique!";
            toast(msg, "error", 4000);
            $("#senhaConf").focus();
        } else {
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/user/cadastrar",
                dataType: "json",
                data: {
                    "nomeUsuario"   : usuario,
                    "senha"         : senha,
                    "senhaConf"     : senhaConf
                },
                beforeSend: function() {
                    toast("Processando...");
                },
                success: function(json) {
                    if(json["status"] == 1) {
                        toast("Cadastrado com Sucesso", "success");
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
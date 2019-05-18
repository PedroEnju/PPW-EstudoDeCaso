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

    $("#btn_entrar").on("click", function(){
        
        var usuario = $("#usuario").val();
        var senha = $("#senha").val();

        var msg = '';
        if(usuario.length == 0) {
            msg = "Usuário não pode ser em branco!";
            toast(msg, "error");
        } else if(senha.length == 0) {
            msg = "Senha não pode ser em branco!";
            toast(msg, "error");
        } else {
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/login/logon.php",
                dataType: "json",
                data: $("#formLogin").serialize(),
                beforeSend: function() {
                    $("#btn_entrar").attr("disabled", true);
                    $("#btn_cadastrar").attr("disabled", true);
                    msg = 'Processando...';
                    toast(msg);
                },
                success: function(json) {
                    if(json["status"] == 1) {
                        msg = 'Autenticado!';
                        toast(msg, "success");
                        window.location.href = BASE_URL + "MyCode/view/principal.php";
                    } else {
                        toast(json["error"], "error");
                    }
                },
                error: function(e) {
                    console.log(e);
                }
            })
            .done(function(){
                $("#btn_entrar").attr("disabled", false);
                $("#btn_cadastrar").attr("disabled", false);
            });
        }

        return;
    });

    $(document).keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $("#btn_entrar").click();
        }
    });

});
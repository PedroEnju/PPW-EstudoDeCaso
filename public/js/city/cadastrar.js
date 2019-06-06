$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formCidade").fadeIn();
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

    $("#nomeCidade").on("keypress", function(e){
        keyClick(e);
    });

    $("#cep").on("keypress", function(e){
        keyClick(e);
    });

    $("#btn_cadastrar").on("click", function(){
        
        $(this).attr("disabled", true);0
        
        var idEstado 	= $("select[name=idEstado]").val();
        var nomeCidade  = $("#nomeCidade").val().trim();
        var cep			= $("#cep").val().trim();
        
        var msg = "";
        if (typeof idEstado == "undefined" || idEstado.length == 0) {
        	msg = "Estado não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#idEstado").focus();
        } else if(typeof nomeCidade == "undefined" || nomeCidade.length == 0) {
            msg = "Nome da Cidade não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#nomeCidade").focus();
        } else if(typeof cep == "undefined" || cep.length == 0) {
            msg = "CEP não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#cep").focus();
        } else if(cep.length != 9) {
            msg = "CEP está incorreto!";
            toast(msg, "error", 4000);
            $("#cep").focus();
        } else {
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/city/cadastrar",
                dataType: "json",
                data: {
                	"idEstado"		: idEstado,
                    "nomeCidade"    : nomeCidade,
                    "cep"			: cep
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
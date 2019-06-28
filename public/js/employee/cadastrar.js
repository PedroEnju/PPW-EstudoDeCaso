$(document).ready(function(){

	$("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formFuncionario").fadeIn();
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

    $("#btn_cadastrar").on("click", function(){
        
        $(this).attr("disabled", true);
        
        var nomeFuncionario     = $("#nomeFuncionario").val().trim();
        var matricula           = $("#matricula").val().trim();
        var rg                  = $("#rg").val().trim();
        var departamento        = $("#departamento").val().trim();

        var msg = "";
        if(typeof nomeFuncionario == "undefined" || nomeFuncionario.length == 0) {
            msg = "Nome do Funcionário não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#nomeFuncionario").focus();
        } else if(typeof matricula == "undefined" || matricula.length == 0) {
            msg = "Matrícula não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#matricula").focus();
        } else if(typeof rg == "undefined" || rg.length == 0) {
            msg = "RG não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#rg").focus();
        } else if(typeof departamento == "undefined" || departamento.length == 0) {
            msg = "Departamento não pode ser em branco!";
            toast(msg, "error", 4000);
            $("#departamento").focus();
        } else {
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/employee/cadastrar",
                dataType: "json",
                data: $("#formFuncionario").serialize(),
                beforeSend: function() {
                    toast("Processando...");
                },
                success: function(json) {
                    if(json["status"] == 1) {
                        toast(json["response"], "success", 10000);
                    } else {
                        toast("Falha: " + json["error"], "error");
                    }
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
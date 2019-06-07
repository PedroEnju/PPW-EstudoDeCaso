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

    $("#btn_salvar").on("click", function(){
        
        $(this).attr("disabled", true);
        

        var id          = $("#idEstado").val();
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
            $.ajax({
                type: "post",
                url: BASE_URL + "MyCode/functions/state/editar",
                dataType: "json",
                data: {
                    "id"            : id,
                    "nomeEstado"    : nomeEstado,
                    "uf"            : uf
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
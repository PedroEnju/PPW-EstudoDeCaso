$(document).ready(function(){

	$("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#formCliente").fadeIn();
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

    function verifyDataNascimento()
    {
        var value = $("#dtNascimento").val();
        var valLength = value.length;
        var msg = "";
        var retorno = true;

        if(valLength == 10) {
            var ano = value.substring(6,10);
            var mes = value.substring(3,5);
            var dia = value.substring(0,2);

            if(mes < 1 || mes > 12) {
                msg = "Mês está incorreto. Por favor cheque a data de nascimento!";
                toast(msg, "error");
                retorno = false;
            } else if(ano > new Date().getFullYear()) {
                msg = "Ano está no futuro. Por favor cheque a data de nascimento!";
                toast(msg, "error");
                retorno = false;
            } else if(dia < 1 || dia > 31) {
                msg = "Dia está incorreta. Por favor cheque a data de nascimento!";
                toast(msg, "error");
                retorno = false;
            } else {
                var mesDias = [
                    {1  : 31},{2  : 29},{3  : 31},
                    {4  : 30},{5  : 31},{6  : 30},
                    {7  : 31},{8  : 31},{9  : 30},
                    {10 : 31},{11 : 30},{12 : 31}
                ];
                if(dia > mesDias[mes-1][mes]) {
                    msg = "Este mês não tem essa quantidade de dias. Por favor cheque a data de nascimento!";
                    toast(msg, "error");
                    retorno = false;
                }
            }

        } else if(valLength > 0) {
            msg = "Data de Nascimento está incorreta!";
            toast(msg, "error");
            retorno = false;
        }
        return retorno;
    }

    $("#dtNascimento").on("focusout", function(){ verifyDataNascimento(); });
    $("#cpf").unmask().mask('000.000.000-00', {reverse: false});
    $("#dtNascimento").unmask().mask('00/00/0000', {reverse: false});
    
});
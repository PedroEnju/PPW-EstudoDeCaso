$(document).ready(function(){

    $("#loading").fadeOut(50, function(){
        $("#image").fadeIn();
        $("#lista").fadeIn();
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

    const swalDelete = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger ml-3',
            cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false,
    });

    /* Função de Exclusão */
    /* begin: */
    function excluir(url, title, id)
    {
        swalDelete.fire({
            type: 'warning',
            title: 'Deseja remover ' + title + '?',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            showLoaderOnConfirm: true,
            reverseButtons: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                $.ajax({
                    type: "post",
                    url: url,
                    dataType: "json",
                    data: {
                        "id" : id
                    },
                    success: function(json) {
                        if(json["status"] == 1) {
                            toast("Removido com sucesso!", "success", 4000);
                            window.location.reload();
                        } else {
                            toast("Falha: " + json["error"], "error", 5000);
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            },
        });
    }
    /* end; */

    $(".cidade-editar").on("click", function(){
        var id      = $(this).parent().parent().attr("idCidade");
        window.location.href = BASE_URL + "MyCode/view/cidade-edit?id=" + id;
    });

    $(".cidade-excluir").on("click", function(){

        var url     = BASE_URL + "MyCode/functions/city/excluir";
        var title   = "Cidade: " + $(this).parent().parent().find(".name").html();
        var id      = $(this).parent().parent().attr("idCidade");

        excluir(url, title, id);
        
    });

});
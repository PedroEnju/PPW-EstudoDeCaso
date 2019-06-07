
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) exit("Não possui permissão!"); ?>
<?php

    $status = array(
        "A"     => "Ativo",
        "I"     => "Inativo"
    );

    include_once "../functions/state/estado.php";
    $estados = getAll();
?>
        <title> Tela de Listagem de Estado </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-xs-auto col-md-11 col-lg-11 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Listagem de Estado</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <div id="lista" class="inLoading">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome do Estado</th>
                                    <th scope="col">UF</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <colgroup width="250"></colgroup>
                            <colgroup width="20"></colgroup>
                            <colgroup width="25"></colgroup>
                            <colgroup width="50"></colgroup>
                            <tbody id="table-estado" class="text-light">
                                <?php if(isset($estados)) : ?>
                                    <?php foreach ($estados as $estado) : ?>
                                        <tr idEstado="<?= $estado["id_estado"] ?>">
                                            <td class="name"><?= ucwords(strtolower($estado["nome_estado"])) ?></td>
                                            <td class="uf"><?= strtoupper($estado["uf"]) ?></td>
                                            <td><?= $status[$estado["status"]] ?></td>
                                            <td>
                                                <a class="estado-editar btn btn-primary btn-sm btn-block">Editar</a>
                                                <a class="estado-excluir btn btn-danger btn-sm btn-block">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once '../include/scripts.php'; ?>

        <script type="text/javascript" src="<?= URL ?>public/JS/shared/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/state/list.js"></script>
    </body> 
</html>


<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>
<?php

    $status = array(
        "A"     => "Ativo",
        "I"     => "Inativo"
    );

    include_once "../functions/city/cidade.php";
    $cidades = getAllFK();
?>
        <title> Tela de Listagem de Cidade </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-md-11 col-lg-11 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Listagem de Cidade</h1>
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
                                    <th scope="col">Nome da Cidade</th>
                                    <th scope="col">CEP</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <colgroup width="80"></colgroup>
                            <colgroup width="250"></colgroup>
                            <colgroup width="20"></colgroup>
                            <colgroup width="25"></colgroup>
                            <colgroup width="50"></colgroup>
                            <tbody id="table-cidade" class="text-light">
                                <?php if(isset($cidades)) : ?>
                                    <?php foreach ($cidades as $cidade) : ?>
                                        <tr idCidade="<?= $cidade["id_cidade"] ?>">
                                            <td><?= $cidade["nome_estado"] ?></td>
                                            <td class="name"><?= ucwords(strtolower($cidade["nome_cidade"])) ?></td>
                                            <td class="uf"><?= $cidade["cep"] ?></td>
                                            <td><?= $status[$cidade["status"]] ?></td>
                                            <td>
                                                <a class="cidade-editar btn btn-primary btn-sm btn-block">Editar</a>
                                                <a class="cidade-excluir btn btn-danger btn-sm btn-block">Excluir</a>
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
        <script type="text/javascript" src="<?= URL ?>public/JS/city/list.js"></script>
    </body> 
</html>

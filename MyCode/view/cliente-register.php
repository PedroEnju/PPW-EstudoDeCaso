
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>
<?php
    include_once "../functions/city/cidade.php";
    $cidades = getAll();
?>
        <title> Tela de Cadastro de Cliente </title>
    </head>
    <body class="bg-secondary">

        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <img class="mb-4" id="logo" src="<?= URL ?>public/img/LOGO.png" alt="logo.png" width="150">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Cadastrar</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formCliente" name="formCliente" method="post"> 
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="idCidade" name="idCidade" class="form-control text-capitalize">
                                        <option selected="selected" hidden>Selecione uma Cidade</option>
                                        <?php if(isset($cidades)) : ?>
                                            <?php while ($cidade = $cidades->fetch(PDO::FETCH_ASSOC)) : ?>
                                                <option value="<?= $cidade["id_cidade"] ?>"><?= trim(strtolower($cidade["nome_cidade"])) ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeCliente" name="nomeCliente" type="text" maxlength="100" placeholder="Nome completo" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="cpf" name="cpf" type="text" placeholder="___.___.___-__" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="dtNascimento" name="dtNascimento" type="text" placeholder="__/__/____" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="sexo" name="sexo" class="form-control text-capitalize">
                                        <option selected="selected" hidden>Selecione um Sexo</option>
                                        <option value="N">Não informar</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="estadoCivil" name="estadoCivil" class="form-control">
                                        <option selected="selected" hidden>Selecione um Estado Civil</option>
                                        <option value="0">Não Informar</option>
                                        <option value="1">Casado(a)</option>
                                        <option value="2">Divorciado(a)</option>
                                        <option value="3">Separado(a)</option>
                                        <option value="4">Solteiro(a)</option>
                                        <option value="5">União Estável</option>
                                        <option value="6">Viúvo(a)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="email" name="email" type="text" placeholder="Email" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-12 col-lg-12">
                            <span class="help-block d-flex justify-content-center h6"></span>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <button class="btn btn-sm btn-danger btn-block" type="button" id="btn_voltar">Voltar</button>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <button class="btn btn-md btn-success btn-block" type="button" id="btn_cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once '../include/scripts.php'; ?>

        <script type="text/javascript" src="<?= URL ?>public/JS/shared/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/shared/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/client/cadastrar.js"></script>
    </body> 
</html>

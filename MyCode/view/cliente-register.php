<?php exit("Não está em operação!"); ?>
<?php include_once "../include/header.php"; ?>

        <title> Tela de Cadastro de Cliente </title>
    </head>
    <body class="bg-secondary">
        <main class="d-flex justify-content-center mt-3">
            <div class="col-xs-auto col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <img class="mb-4" id="logo" src="<?= URL ?>public/img/LOGO.png" alt="logo.png" width="150">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Cadastrar</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formCliente" name="formCliente" method="post"> 
                    <div class="row">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-name">
                                            <!-- <img src="<?= URL ?>public/img/name.png" alt="Name" width="20"> -->
                                        </span>
                                    </div>
                                    <input class="form-control" id="nome" name="nome" type="text" maxlength="100" placeholder="Nome completo" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-auto col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-cpf">
                                            <!-- <img class="img" src="<?= URL ?>public/img/cpf.png" alt="CPF" width="20"> -->
                                        </span>
                                    </div>
                                    <input class="form-control" id="cpf" name="cpf" type="text" placeholder="___.___.___-__" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-auto col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-dtnascimento">
                                            <!-- <img class="img" src="<?= URL ?>public/img/dtnascimento.png" alt="Data de Nascimento" width="20"> -->
                                        </span>
                                    </div>
                                    <input class="form-control" id="dtNascimento" name="dtNascimento" type="text" placeholder="__/__/____" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <span class="help-block d-flex justify-content-center h6"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-lg btn-success btn-block" type="button" id="btn_cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-sm btn-danger btn-block" type="button" id="btn_entrar">Voltar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once '../include/scripts.php'; ?>

        <script type="text/javascript" src="<?= URL ?>public/JS/shared/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/user/cadastrar.js"></script>
    </body> 
</html>
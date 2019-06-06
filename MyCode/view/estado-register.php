
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) exit("Não possui permissão!"); ?>

        <title> Tela de Cadastro de Estado </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-xs-auto col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Cadastrar Estado</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formEstado" name="formEstado" method="post"> 
                    <div class="row">
                        <div class="col-xs-auto col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeEstado" name="nomeEstado" type="text" maxlength="100" placeholder="Nome do Estado" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-auto col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="uf" name="uf" type="text" minlength="2" maxlength="2" placeholder="UF" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <span class="help-block d-flex justify-content-center h6"></span>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-xs-auto col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <button class="btn btn-sm btn-danger btn-block" type="button" id="btn_voltar">Voltar</button>
                            </div>
                        </div>
                        <div class="col-xs-auto col-sm-3 col-md-3 col-lg-3 col-xl-3">
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
        <script type="text/javascript" src="<?= URL ?>public/JS/state/cadastrar.js"></script>
    </body> 
</html>

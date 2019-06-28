
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>

        <title> Tela de Cadastro de Funcionário </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-sm-11 col-md-8 col-lg-8 col-lg-5 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Cadastrar Funcionário</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formFuncionario" name="formFuncionario" method="post"> 
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeFuncionario" name="nomeFuncionario" type="text" maxlength="100" placeholder="Nome do Funcionário" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="matricula" name="matricula" type="text" maxlength="50" placeholder="Matrícula" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="rg" name="rg" type="text" placeholder="RG" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="departamento" name="departamento" type="text" maxlength="50" placeholder="Departamento" autocomplete="off">
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
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <button class="btn btn-md btn-danger btn-block" type="button" id="btn_voltar">Voltar</button>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3">
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
        <script type="text/javascript" src="<?= URL ?>public/JS/employee/cadastrar.js"></script>
    </body> 
</html>

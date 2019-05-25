
<?php include_once "../include/header.php"; ?>

        <title> Tela de Login </title>
    </head>
    <body class="bg-secondary">
        <main class="d-flex justify-content-center mt-3">
            <div class="col-xs-auto col-md-6 col-lg-4 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <img class="mb-4" id="logo" src="<?= URL ?>public/img/LOGO.png" alt="logo.png" width="150">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Entrar</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formLogin" name="formLogin" method="post"> 
                    <div class="row">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-login"><img src="<?= URL ?>public/img/login.png" alt="Login" width="20"></span>
                                    </div>
                                    <input class="form-control" id="usuario" name="usuario" type="text" maxlength="25" placeholder="Usuário" autocomplete="current-usuario" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-auto col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-senha"><img class="img" src="<?= URL ?>public/img/password.png" alt="Senha" width="20"></span>
                                    </div>
                                    <input class="form-control" id="senha" name="senha" type="password" placeholder="Senha" autocomplete="current-password">
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
                                <button class="btn btn-lg btn-success btn-block" type="button" id="btn_entrar">Entrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once '../include/scripts.php'; ?>

        <script type="text/javascript" src="<?= URL ?>public/JS/shared/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/login/login.js"></script>
    </body> 
</html>

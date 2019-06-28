
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>
<?php 
    
    $id   = isset($_GET["id"])     ? $_GET["id"]    : NULL;

    include_once "../functions/user/usuario.php";
    $usuario = getAll($id);

    $idUsuario   = NULL;
    $nomeUsuario = NULL; 
    $tipoUsuario = NULL; 

    if($result = $usuario->fetch(PDO::FETCH_ASSOC)) {
        $idUsuario      = isset($result["id_usuario"])      ? $result["id_usuario"]     : NULL; 
        $nomeUsuario    = isset($result["nome_usuario"])    ? $result["nome_usuario"]   : NULL; 
        $tipoUsuario    = isset($result["tipo_usuario"])    ? $result["tipo_usuario"]   : NULL; 
    }

?>
        <title> Tela de Edição de Usuário </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Editar Usuário</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formUsuario" name="formUsuario" method="post"> 
                    <input id="idUsuario" name="idUsuario" type="text" value="<?= $idUsuario ?>" hidden>
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeUsuario" name="nomeUsuario" type="text" maxlength="100" placeholder="Nome do Usuário" autocomplete="off" value="<?= $nomeUsuario ?>" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="tipoUsuario" name="tipoUsuario" class="form-control text-capitalize">
                                        <option value="A" <?= $tipoUsuario == "A" ? 'selected="selected"' : null ?>>Administrador</option>
                                        <option value="C" <?= $tipoUsuario == "C" ? 'selected="selected"' : null ?>>Comum</option>
                                    </select>
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
                                <button class="btn btn-md btn-success btn-block" type="button" id="btn_salvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once '../include/scripts.php'; ?>

        <script type="text/javascript" src="<?= URL ?>public/JS/shared/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/user/edit.js"></script>
    </body> 
</html>

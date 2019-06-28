
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>
<?php 
    
    $id   = isset($_GET["id"])     ? $_GET["id"]    : NULL;

    include_once "../functions/state/estado.php";
    $estado = getAll($id);

    $idEstado   = NULL;
    $nomeEstado = NULL; 
    $uf         = NULL; 

    if($result = $estado->fetch(PDO::FETCH_ASSOC)) {
        $idEstado   = isset($result["id_estado"])   ? $result["id_estado"]      : NULL; 
        $nomeEstado = isset($result["nome_estado"]) ? $result["nome_estado"]    : NULL; 
        $uf         = isset($result["uf"])          ? $result["uf"]             : NULL; 
    }

?>
        <title> Tela de Edição de Estado </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Editar Estado</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formEstado" name="formEstado" method="post"> 
                    <input id="idEstado" name="idEstado" type="text" value="<?= $idEstado ?>" hidden>
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeEstado" name="nomeEstado" type="text" maxlength="100" placeholder="Nome do Estado" autocomplete="off" value="<?= $nomeEstado ?>" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="uf" name="uf" type="text" minlength="2" maxlength="2" placeholder="UF" value="<?= $uf ?>" autocomplete="off">
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
        <script type="text/javascript" src="<?= URL ?>public/JS/state/edit.js"></script>
    </body> 
</html>

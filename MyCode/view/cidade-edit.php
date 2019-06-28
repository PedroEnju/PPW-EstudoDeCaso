
<?php include_once "../include/header.php"; ?>
<?php if(!(isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] == "A")) header("Location:login.php"); ?>
<?php 
    
    $id   = isset($_GET["id"])     ? $_GET["id"]    : NULL;

    include_once "../functions/city/cidade.php";
    $cidade = getAll($id);

    $idCidade   = NULL;
    $nomeCidade = NULL; 
    $cep        = NULL; 

    if($result = $cidade->fetch(PDO::FETCH_ASSOC)) {
        $idCidade   = isset($result["id_cidade"])   ? $result["id_cidade"]      : NULL; 
        $nomeCidade = isset($result["nome_cidade"]) ? $result["nome_cidade"]    : NULL; 
        $cep        = isset($result["cep"])         ? $result["cep"]            : NULL; 
    }

?>
        <title> Tela de Edição de Cidade </title>
    </head>
    <body class="bg-secondary">
        
        <?php include_once '../include/menu.php'; ?>

        <main class="d-flex justify-content-center mt-3">
            <div class="col-12 col-md-8 col-lg-8 bg-shadow">
                <div id="image" class="text-center mb-4 inLoading">
                    <h1 class="h3 pb-1 mb-2 font-weight-normal text-light">Editar Cidade</h1>
                </div>
                <div id="loading" class="mb-3">
                    <div class="container-fluid text-center">Carregando...</div>
                </div>
                <form class="form-signin container inLoading" id="formCidade" name="formCidade" method="post"> 
                    <input id="idCidade" name="idCidade" type="text" value="<?= $idCidade ?>" hidden>
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="nomeCidade" name="nomeCidade" type="text" maxlength="100" placeholder="Nome da Cidade" autocomplete="off" value="<?= $nomeCidade ?>" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" id="cep" name="cep" type="text" minlength="9" maxlength="9" placeholder="CEP" value="<?= $cep ?>" autocomplete="off">
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
        <script type="text/javascript" src="<?= URL ?>public/JS/shared/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= URL ?>public/JS/city/edit.js"></script>
    </body> 
</html>


<?php if(!isset($_SESSION["idUsuario"])) header("location: login.php"); ?>

<link rel="stylesheet" href="../../public/css/menu/menu.css">
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light shadow-md">
        <a class="navbar-brand" href="principal.php">
            <img id="logo" src="../../public/img/LOGO.png" alt="logo.png" height="50" width="55">
        </a>
        <a class="navbar-brand mr-auto d-none d-sm-block" href="principal.php">Tela Inicial</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Navbar Menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <?php if($_SESSION["tipoUsuario"] == "A") : ?>
                        <li class="nav-item dropdown">
                            <div class="btn-dropdown nav-link dropdown-toggle">Cadastro</div>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="<?= URL ?>MyCode/view/estado-register.php">Estado</a>
                                <a class="dropdown-item" href="<?= URL ?>MyCode/view/cidade-register.php">Cidade</a>
                                <a class="dropdown-item" href="<?= URL ?>MyCode/view/usuario-register.php">Usuário</a>
                                <a class="dropdown-item" href="<?= URL ?>MyCode/view/cliente-register.php">Cliente</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item ml-auto">
                        <a class="nav-link text-danger" href="../functions/login/logout.php"> Sair </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

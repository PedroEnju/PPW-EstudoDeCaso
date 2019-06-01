
<?php session_start(); ?>

<?php if(!isset($_SESSION["idUsuario"])) header("location: login.php"); ?>

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
                    <li class="nav-item dropdown">
                        <div class="btn-dropdown nav-link dropdown-toggle">Cadastro</div>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="#">Localidade</a>
                            <a class="dropdown-item" href="../view/usuario-register.php">Usuário</a>
                            <a class="dropdown-item" href="#">Produto</a>
                        </div>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link text-danger" href="../functions/login/logout.php"> Sair </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

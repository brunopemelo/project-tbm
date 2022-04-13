<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <title>Tubominas - Página Inicial</title>
</head>

<body>
    <div class="main_header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="index.php">
                    <img src="assets/img/tubominas-logomarca.png" class="img-responsive" alt="Logo" title="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home me-2"></i>Início</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cadastrar.php"><i class="fas fa-plus me-2"></i>Novo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="listar.php"><i class="fas fa-users me-2"></i>Pessoas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="main_home">
        <div class="container">
            <div class="buttons">
                <a type="button" class="btn btnIndex" href="cadastrar.php">Criar Cadastro</a>
                <a type="button" class="btn btnIndex" href="listar.php">Listar Registros</a>
            </div>
        </div>
    </div>

    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
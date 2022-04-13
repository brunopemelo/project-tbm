<?php
require_once('./system/config.php');
require_once('./system/conexao.php');

$query = $pdo->query("SELECT * FROM pessoas WHERE id = '$id'");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/cadastrar.css">
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <style>
        #mensagem_retorno {
            width: 400px;
            display: flex;
            position: absolute;
            top: 2%;
            right: 10%;
            z-index: 1;
            font-size: 0.95em !important;
            font-weight: 500;
        }
    </style>

    <title>Tubominas - Criar Cadastro</title>
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

    <div class="main_register">
        <div class="container">
            <form action="php/criar_pessoa.php" method="POST">
                <div align="center">
                    <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 'SUCCESS') {
                                echo '<div id="mensagem_retorno" class="alert alert-success justify-content-center" role="alert">
                                Cadastrado! Um momento...</div>';
                            } else if ($_GET['msg'] == 'ERR_EMAIL_VALID'){
                                echo '<div id="mensagem_retorno" class="alert alert-danger justify-content-center" role="alert">
                                Favor inserir um e-mail válido!</div>';
                            } else if ($_GET['msg'] == 'ERR_EMAIL'){
                                echo '<div id="mensagem_retorno" class="alert alert-danger justify-content-center" role="alert">
                                E-mail já cadastrado!</div>';
                            }
                        }
                    ?>
                </div>

                <input type="hidden" id="BASE_URL" name="BASE_URL" value="<?php echo BASE_URL; ?>" />
                <input type="hidden" id="MSG" value="<?= $_GET['msg']; ?>" />

                <div class="form-row">
                    <div class="form-group mt-3">
                        <h5 class="form-label">Cadastro de Pessoas</h5>
                        <hr>
                    </div>

                    <div class="form-group mt-3">
                        <label class="form-label">Nome:</label>
                        <input type="text" autocomplete="off" class="form-control" id="nome" name="nome" maxlength="50" placeholder="Digite seu nome" required>
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Cidade:</label>
                        <input type="text" autocomplete="off" class="form-control" id="cidade" name="cidade" maxlength="50" placeholder="Digite sua cidade" required>
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">E-mail:</label>
                        <input type="email" autocomplete="off" class="form-control" id="email" name="email" maxlength="50" placeholder="Digite seu e-mail" required>
                    </div>

                    <input type="submit" class="btnRegister" value="Cadastrar Pessoa">
                </div>
            </form>
        </div>
    </div>

    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script>
        const alert = document.querySelector("#mensagem_retorno");
        const bsAlert = new bootstrap.Alert(alert);
        setTimeout(() => {
            bsAlert.close();
        }, 2000);
    </script>
</body>

</html>
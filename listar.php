<?php
require_once('./system/config.php');
require_once('./system/conexao.php');
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/listar.css">
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <style>
        #mensagem_retorno {
            width: 400px;
            display: flex;
            position: relative;
            right: auto;
            z-index: 1;
            font-size: 0.95em !important;
            font-weight: 500;
        }
    </style>

    <title>Tubominas - Listar Registros</title>
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

    <div class="main_tables">
        <div align="center">
            <?php 
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == 'SUCCESS') {
                        echo '<div id="mensagem_retorno" class="alert alert-success justify-content-center" role="alert">
                        Pessoa alterada com sucesso!</div>';
                    } else if( $_GET['msg'] == 'SUC_DEL') {
                        echo '<div id="mensagem_retorno" class="alert alert-success justify-content-center" role="alert">
                        Pessoa excluída com sucesso!</div>';
                    } else if ($_GET['msg'] == 'ERR_PESSOA') {
                        echo '<div id="mensagem_retorno" class="alert alert-danger justify-content-center" role="alert">
						Pessoa não encontrada!</div></div>';
                    }
                }
            ?>
        </div>

        <div class="container table-responsive">
            <?php
                $query = $pdo->query("SELECT * FROM pessoas");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                $total_reg = count($resultado);
                if ($total_reg > 0) {
            ?>

            <table id="example" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < $total_reg; $i++) {
                            foreach ($resultado[$i] as $key => $value) {
                        }

                        $id = $resultado[$i]['id'];
                        $nome = $resultado[$i]['nome'];
                        $cidade = $resultado[$i]['cidade'];
                        $email = $resultado[$i]['email'];
                    ?>
                    <tr>
                        <td><?php echo $resultado[$i]['id'] ?></td>
                        <td><?php echo $resultado[$i]['nome'] ?></td>
                        <td><?php echo $resultado[$i]['cidade'] ?></td>
                        <td><?php echo $resultado[$i]['email'] ?></td>
                        <td>
                            <?php  ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#abreModal1-<?php echo $id;?>">
                                <button type="button" class="btn btn-sm btn-primary">Editar</button></a>
                            <?php  ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#abreModal2-<?php echo $id;?>">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="abreModal1-<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                        <form method="POST" id="atualizar_pessoa" action="<?php echo BASE_URL;?>/php/editar_pessoa.php">
                            <input type="hidden" id="BASE_URL" name="BASE_URL" value="<?php echo BASE_URL; ?>" />
                            <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?php echo $id;?>" />

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6><i class="fas fa-solid fa-pen me-2"></i>Editar Pessoa</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label">Nome:</label>
                                            <input type="text" value="<?php echo $nome ?>" class="form-control" id="nome" name="nome" maxlength="50" required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label class="form-label">Cidade:</label>
                                            <input type="text" value="<?php echo $cidade ?>" autocomplete="off" class="form-control" id="cidade" name="cidade" maxlength="50" required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label class="form-label">E-mail:</label>
                                            <input type="email" value="<?php echo $email ?>" autocomplete="off" class="form-control" id="email" name="email" maxlength="50" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary py-0 my-0">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal fade" id="abreModal2-<?php echo $id;?>" tabindex="-1" aria-hidden="true">
                        <form method="POST">
                            <input type="hidden" id="BASE_URL" name="BASE_URL" value="<?php echo BASE_URL; ?>" />
                            <input type="hidden" id="id_excluir" name="id_excluir" value="<?php echo $id;?>" />

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6><i class="fa fa-solid fa-trash me-2"></i></i>Deletar Pessoa</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>Têm certeza que deseja excluir?</p>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button onclick="excluir_pessoa(<?php echo $id; ?>);" type="button" class="btn btn-danger py-0 my-0">Excluir</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                } else {
                    echo 'Não existem pessoas cadastradas!';
                }
                ?>
        </div>
    </div>
    </div>

    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/excluir_pessoa.js"></script>
    <script src="assets/js/editar_pessoa.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "Não foi encontrado nenhum resultado",
                    "sEmptyTable": "Nenhum dado disponível",
                    "sInfo": "Mostrando registros _START_ de _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros de 0 e 0 de um total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Carregando...",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sLast": "Último",
                        "sNext": "Seguinte",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>

    <script>
        const alert = document.querySelector("#mensagem_retorno");
        const bsAlert = new bootstrap.Alert(alert);
        setTimeout(() => {
            bsAlert.close();
        }, 2000);
    </script>
</body>

</html>
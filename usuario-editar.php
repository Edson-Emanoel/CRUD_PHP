<?php
    session_start();
    require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de um Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> 
                            Editar Usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                                $query = "SELECT * FROM usuarios WHERE id='$usuario_id' ";
                                $query_run = mysqli_query($conexao, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    $usuario = mysqli_fetch_array($query_run);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="usuario_id" value="<?= $usuario['id']; ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" value="<?= $usuario['nome']; ?>" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" value="<?= $usuario['email']; ?>"  />
                            </div>

                            <div class="mb-3">
                                <label for="data_nasc">Data Nascimento:</label>
                                <input type="date" name="data_nasc" class="form-control" value="<?= $usuario['data_nascimento']; ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Editar Usuário</button>
                            </div>
                        </form>
                        <?php
                                } else {
                                    echo "<h4>Usuário não encontrado</h4>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
<?php
    session_start();
    require '../conexao.php';
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
    <?php include('../navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> 
                            Editar Perfil
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $perfil_id = mysqli_real_escape_string($conexao, $_GET['id']);
                                $query = "SELECT * FROM perfil WHERE id='$perfil_id' ";
                                $query_run = mysqli_query($conexao, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    $perfil = mysqli_fetch_array($query_run);
                        ?>
                        <form action="../acoes.php" method="POST">
                            <input type="hidden" name="perfil_id" value="<?= $perfil['id']; ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" value="<?= $perfil['nome']; ?>" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_perfil" class="btn btn-primary">Editar Perfil</button>
                            </div>
                        </form>
                        <?php
                                } else {
                                    echo "<h4>Perfil não encontrado</h4>";
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
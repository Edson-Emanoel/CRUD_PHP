<?php
    session_start();
    require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BASICO - PHP MYSQL HTML CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php include('../navbar.php'); ?>
    <div class="container mt-4">
        <?php include('../mensagem.php'); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-full flex items-center justify-between">
                        Lista de Perfis(Níveis)
                        
                        <div class="float-end">
                            <a href="./perfil-create.php" class="btn btn-primary">Adicionar Níveis</a>
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM perfil";
                                $perfil = mysqli_query($conexao, $sql);
                                if(mysqli_num_rows($perfil) > 0){
                                    foreach($perfil as $perfil){
                            ?>
                            <tr>
                                <td><?= $perfil['id']; ?></td>
                                <td><?= $perfil['nome']; ?></td>
                                <td>
                                    <a href="./perfil-view.php?id=<?= $perfil['id']; ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                    <a href="./perfil-editar.php?id=<?= $perfil['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="../acoes.php" class="d-inline" method="POST">
                                        <button type="submit" name="delete_perfil" value="<?= $perfil['id']; ?>" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo '<h5>Nenhum perfil(nível) encontrado</h5>';
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
<!-- perfil$ -->
<?php

session_start();
require 'conexao.php';

// Verifica o botão se a prop name do botão é igual a salvar_usuario
if (isset($_POST['salvar_usuario'])) {

    $nome       = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email      = mysqli_real_escape_string($conexao, $_POST['email']);
    $data_nasc  = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $perfil_id  = mysqli_real_escape_string($conexao, $_POST['perfil_id']);
    $senha      = mysqli_real_escape_string(
        $conexao,
        password_hash($_POST['senha'], PASSWORD_DEFAULT)
    );

    // Comando para inserir no banco (agora com perfil_id)
    $query = "
        INSERT INTO usuarios 
            (nome, email, data_nascimento, senha, perfil_id) 
        VALUES 
            ('$nome', '$email', '$data_nasc', '$senha', '$perfil_id')
    ";

    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        $_SESSION['mensagem'] = "Usuário adicionado com sucesso";
        header("Location: ./usuario/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar usuário";
        header("Location: ./usuario/usuario-create.php");
        exit;
    }
}
if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']); // Pega o id do usuário para editar

    $nome =      mysqli_real_escape_string($conexao, $_POST['nome']); // Pega o valor do campo nome pelo name
    $email =     mysqli_real_escape_string($conexao, $_POST['email']); // Pega o valor do campo email pelo name
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']); // Pega o valor do campo data_nascimento pelo name
    $senha =     mysqli_real_escape_string($conexao, $_POST['senha']); // Pega o valor do campo senha pelo name e já criptografa a senha

    // Comando para atualizar no banco
    $query = "UPDATE usuarios SET nome='$nome', email='$email', data_nascimento='$data_nasc', senha='" . password_hash($senha, PASSWORD_DEFAULT) . "' WHERE id='$usuario_id' ";
    $query_run = mysqli_query($conexao, $query); // Executa o comando no banco

    // Verifica se o comando foi executado com sucesso
    if($query_run){
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso";
        header("Location: ./usuario/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Falha ao atualizar usuário";
        
        echo "ID Usuário: " . $usuario_id . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Data Nascimento: " . $data_nasc . "<br>";
        echo "Senha: " . $senha . "<br>";
        header("Location: ./usuario/index.php");
        exit;
    }
}
if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']); // Pega o id do usuário para deletar
    // echo $usuario_id; exit;

    // Comando para deletar no banco
    $query = "DELETE FROM usuarios WHERE id='$usuario_id' ";
    $query_run = mysqli_query($conexao, $query); // Executa o comando no banco

    // Verifica se o comando foi executado com sucesso
    if($query_run){
        $_SESSION['mensagem'] = "Usuário deletado com sucesso";
        header("Location: ./usuario/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Falha ao deletar usuário";
        header("Location: ./usuario/index.php");
        exit;
    }
}
if (isset($_POST['salvar_perfil'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']); // Pega o valor do campo nome pelo name

    // Comando para inserir no banco
    $query = "INSERT INTO perfil (nome) VALUES ('$nome')";
    $query_run = mysqli_query($conexao, $query); // Executa o comando no banco

    // Verifica se o comando foi executado com sucesso
    if($query_run){
        $_SESSION['mensagem'] = "Categoria adicionada com sucesso";
        header("Location: ./perfil/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar categoria";
        header("Location: ./perfil/perfil-create.php");
        exit;
    }
}
if (isset($_POST['update_perfil'])) {
    $perfil_id = mysqli_real_escape_string($conexao, $_POST['perfil_id']); // Pega o id do perfil para editar

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']); // Pega o valor do campo nome pelo name

    // Comando para atualizar no banco
    $query = "UPDATE perfil SET nome='$nome' WHERE id='$perfil_id' ";
    $query_run = mysqli_query($conexao, $query); // Executa o comando no banco

    // Verifica se o comando foi executado com sucesso
    if($query_run){
        $_SESSION['mensagem'] = "Perfil atualizado com sucesso";
        header("Location: ./perfil/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Falha ao atualizar perfil";
        header("Location: ./perfil/index.php");
        exit;
    }
}
if (isset($_POST['delete_perfil'])) {
    $perfil_id = mysqli_real_escape_string($conexao, $_POST['delete_perfil']); // Pega o id do perfil para deletar

    // Comando para deletar no banco
    $query = "DELETE FROM perfil WHERE id='$perfil_id' ";
    $query_run = mysqli_query($conexao, $query); // Executa o comando no banco

    // Verifica se o comando foi executado com sucesso
    if($query_run){
        $_SESSION['mensagem'] = "Perfil deletado com sucesso";
        header("Location: ./perfil/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Falha ao deletar perfil";
        header("Location: ./perfil/index.php");
        exit;
    }
}
?>
<?php
include_once('../conexao-bd.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $data_admissao = $_POST['data_admissao'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];

    $sqlUpdate = "UPDATE Funcionario SET 
        nome='$nome',  
        cpf='$cpf',  
        email='$email', 
        telefone='$telefone', 
        endereco='$endereco', 
        data_admissao='$data_admissao', 
        cargo='$cargo', 
        setor='$setor' 
    WHERE id=$id";

    $result = $conexao->query($sqlUpdate);
} else {
    header("Location: ../listas/sistema-funcionario.php");
}
?>
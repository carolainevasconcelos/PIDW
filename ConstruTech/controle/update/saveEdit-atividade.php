<?php
include_once('../conexao-bd.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome_atividade = $_POST['nome_atividade'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_termino = $_POST['data_termino'];
    $status = $_POST['statu'] ?? '';
    $funcionario_id = $_POST['funcionario_id'] ?? null;
    $projeto_id = $_POST['projeto_id'] ?? null;

    // Define a consulta para selecionar a atividade com o ID fornecido
    $sqlSelect = "SELECT * FROM Atividade WHERE id='$id'";
    $result_atividade = $conexao->query($sqlSelect);

    if ($result_atividade && $result_atividade->num_rows > 0) {
        $sqlUpdate = "UPDATE Atividade SET 
            nome_atividade='$nome_atividade', 
            descricao='$descricao', 
            data_inicio='$data_inicio', 
            data_termino='$data_termino', 
            status='$status', 
            funcionario_id=" . ($funcionario_id ? "'$funcionario_id'" : "NULL") . ", 
            projeto_id=" . ($projeto_id ? "'$projeto_id'" : "NULL") . " 
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);

        if ($result) {
            header("Location: ../listas/sistema-atividade.php");
            exit();
        } else {
            echo "Erro ao atualizar a atividade: " . $conexao->error;
        }
    } else {
        header("Location: ../listas/sistema-atividade.php");
        exit();
    }
}
?>

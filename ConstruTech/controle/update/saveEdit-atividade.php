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

    $stmt = $conexao->prepare("UPDATE atividade SET 
        nome_atividade = ?,  
        descricao = ?,  
        data_inicio = ?,  
        data_termino = ?, 
        status = ?,
        funcionario_id = ?,
        projeto_id = ? 
    WHERE id = ?");

    $stmt->bind_param("ssssssss", $nome_atividade, $descricao, $data_inicio, $data_termino, $status, 
                      $funcionario_id, $projeto_id, $id);

    if ($stmt->execute()) {
        echo "Atividade atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar atividade: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: ../listas/sistema-atividade.php"); 
    exit(); 
}
?>
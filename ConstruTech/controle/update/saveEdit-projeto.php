<?php
include_once('../conexao-bd.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome']; 
    $descricao = $_POST['descricao']; 
    $data_inicio = $_POST['data_inicio']; 
    $data_termino = $_POST['data_termino']; 
    $statu = $_POST['statu']; 
    $cliente_id = $_POST['cliente_id'] ?? null; 

    if (!empty($nome) && !empty($descricao) && !empty($data_inicio) && !empty($data_termino) && !empty($statu)) {
        $stmt = $conexao->prepare("UPDATE Projeto SET 
            nome = ?, descricao = ?, data_inicio = NULLIF(?, ''), 
            data_termino = NULLIF(?, ''), statu = ?, cliente_id = ? 
            WHERE id = ?");
        $stmt->bind_param("sssssii", $nome, $descricao, $data_inicio, $data_termino, $statu, $cliente_id, $id);

        if ($stmt->execute()) {
            echo "Projeto atualizado com sucesso!"; // fazer js
        } else {
            echo "Erro ao atualizar projeto: " . $stmt->error; // fazer js
        }

        $stmt->close();
    } else {
        echo "Erro: Todos os campos obrigatórios devem ser preenchidos."; // fazer js
    }
} else {
    header("Location: ../listas/sistema-projeto.php");
}
?>
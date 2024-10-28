<?php
include_once('../conexao-bd.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $transacao = $_POST['tipo_transacao'] ?? '';
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $projeto_id = $_POST['projeto_id'] ?? null;
    $fornecedor_id = $_POST['fornecedor_id'] ?? null;

    if (!empty($transacao) && !empty($valor) && !empty($data) && !empty($descricao)) {
        // Verifica se a transação é receita ou despesa
        if ($transacao === 'receita') {
            $stmt = $conexao->prepare("UPDATE Financeiro SET 
                tipo_transacao = ?, valor = ?, data = NULLIF(?, ''), 
                descricao = ?, projeto_id = ?, fornecedor_id = NULL 
                WHERE id = ?");
            $stmt->bind_param("sdssii", $transacao, $valor, $data, $descricao, $projeto_id, $id);
        } elseif ($transacao === 'despesa') {
            $stmt = $conexao->prepare("UPDATE Financeiro SET 
                tipo_transacao = ?, valor = ?, data = NULLIF(?, ''), 
                descricao = ?, projeto_id = NULL, fornecedor_id = ? 
                WHERE id = ?");
            $stmt->bind_param("sdssi", $transacao, $valor, $data, $descricao, $fornecedor_id, $id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Transação atualizada com sucesso!');</script>";
            echo "<script>window.location.href = '../listas/sistema-financeiro.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar transação: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erro: Todos os campos obrigatórios devem ser preenchidos.');</script>";
    }
} else {
    header("Location: ../listas/sistema-financeiro.php");
}
?>
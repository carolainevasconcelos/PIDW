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
        //receita
        if ($transacao === 'receita') {
            $sqlUpdate = "UPDATE Financeiro SET 
                tipo_transacao='$transacao', 
                valor='$valor', 
                data='$data', 
                descricao='$descricao', 
                projeto_id='$projeto_id', 
                fornecedor_id=NULL 
            WHERE id=$id";
        //despesa
        } elseif ($transacao === 'despesa') {
            $sqlUpdate = "UPDATE Financeiro SET 
                tipo_transacao='$transacao', 
                valor='$valor', 
                data='$data', 
                descricao='$descricao', 
                projeto_id=NULL, 
                fornecedor_id='$fornecedor_id' 
            WHERE id=$id";
        }

        $result = $conexao->query($sqlUpdate);

        if ($result) {
            header("Location: ../listas/sistema-financeiro.php");
        } else {
            echo "Erro ao atualizar o registro financeiro: " . $conexao->error;
        }
    }
} else {
    header("Location: ../listas/sistema-financeiro.php");
}
?>
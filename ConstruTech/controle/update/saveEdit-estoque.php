<?php
include_once('../conexao-bd.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $qtd = $_POST['quantidade_total'];
    $movimentacao = $_POST['tipo_movimentacao'];
    $data = $_POST['data_movimentacao'];
   
    $financeiro_id = !empty($_POST['financeiro_id']) ? $_POST['financeiro_id'] : "NULL";
    $projeto_id = !empty($_POST['projeto_id']) ? $_POST['projeto_id'] : "NULL";

    $sqlUpdate = "UPDATE estoque SET
        produto='$produto',  
        quantidade_total='$qtd',  
        tipo_movimentacao='$movimentacao',  
        data_movimentacao='$data',
        projeto_id=$projeto_id,
        financeiro_id=$financeiro_id
    WHERE id=$id";

    if ($conexao->query($sqlUpdate) === TRUE) {
        header("Location: ../listas/sistema-estoque.php");
    } else {
        echo "Erro ao atualizar o registro: " . $conexao->error;
    }
} else {
    header("Location: ../listas/sistema-estoque.php");
}
?>
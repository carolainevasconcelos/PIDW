<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM funcionario WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    // print_r($result);

    if ($result->num_rows > 0) {
        
        $sqlDelete = "DELETE FROM funcionario  WHERE id=$id";
        
        $resultDelete = $conexao->query($sqlDelete);
    } else {
        header('Location: sistema-funcionario.php');
    }
}
?>
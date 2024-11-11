<?php
if (!empty($_GET['id'])) {
    include_once('../conexao-bd.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM atividade WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $sqlDelete = "DELETE FROM atividade  WHERE id=$id";
        
        $resultDelete = $conexao->query($sqlDelete);
    } else {
        header('Location: ../../visao/paginas/pagCronograma.php');
    }
}
?>
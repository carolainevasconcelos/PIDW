<?php
include_once('conexao-bd.php');

header('Content-Type: application/json');

$query = "SELECT id, mensagem, status, data FROM Notificacoes WHERE status = 'não lida' ORDER BY data DESC";
$resultado = mysqli_query($conexao, $query);

$notificacoes = [];

if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($notificacao = mysqli_fetch_assoc($resultado)) {
        $notificacoes[] = $notificacao;
    }
}

echo json_encode($notificacoes);
?>
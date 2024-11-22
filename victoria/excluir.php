<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto excluído com sucesso!";
} else {
    echo "Erro ao excluir produto: " . $conn->error;
}

$conn->close();
?>
<a href="listar.php">Voltar</a>

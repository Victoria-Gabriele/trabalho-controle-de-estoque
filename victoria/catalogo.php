<?php

session_start();


if (isset($_GET['excluir'])) {
    $idExcluir = $_GET['excluir']; 
    unset($_SESSION['produtos'][$idExcluir]); 
    $_SESSION['produtos'] = array_values($_SESSION['produtos']); 
    header('Location: catalogo.php'); 
    exit;
}


if (isset($_POST['editar'])) {
    $idProduto = $_POST['idProduto']; 
    $_SESSION['produtos'][$idProduto]['nome'] = $_POST['nome'];
    $_SESSION['produtos'][$idProduto]['descricao'] = $_POST['descricao'];
    $_SESSION['produtos'][$idProduto]['preco'] = $_POST['preco'];
    $_SESSION['produtos'][$idProduto]['quantidade'] = $_POST['quantidade'];
    header('Location: catalogo.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
    <link rel="stylesheet" href="catalogoProdutos.css">
</head>
<body>
    <h1>Catálogo de Produtos</h1>

    
    <?php if (isset($_SESSION['produtos']) && count($_SESSION['produtos']) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['produtos'] as $id => $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                        <td>
                          
                            <a href="catalogo.php?excluir=<?php echo $id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este produto?');">Excluir</a> | 
                           
                            <a href="editar.php?id=<?php echo $id; ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum produto cadastrado.</p>
    <?php endif; ?>

    <button><a href="index.php">Voltar</a></button>

    <footer>
        <p>Desenvolvido por  <a href="https://github.com/Victoria-Gabriele">Victoria Gabriele</a>
            <br> Técnica em Desenvolvimento de Sistemas
        </p> 
    </footer>
</body>
</html>

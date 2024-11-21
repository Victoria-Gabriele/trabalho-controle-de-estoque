<?php
// Inicia a sessão para acessar os dados armazenados
session_start();

// Verifica se um produto foi excluído
if (isset($_GET['excluir'])) {
    $idExcluir = $_GET['excluir']; // Recebe o índice do produto a ser excluído
    unset($_SESSION['produtos'][$idExcluir]); // Remove o produto da sessão
    $_SESSION['produtos'] = array_values($_SESSION['produtos']); // Reindexa os produtos
    header('Location: catalogo.php'); // Redireciona para evitar reenvio do formulário
    exit;
}

// Verifica se os dados de edição foram enviados
if (isset($_POST['editar'])) {
    $idProduto = $_POST['idProduto']; // ID do produto a ser editado
    $_SESSION['produtos'][$idProduto]['nome'] = $_POST['nome'];
    $_SESSION['produtos'][$idProduto]['descricao'] = $_POST['descricao'];
    $_SESSION['produtos'][$idProduto]['preco'] = $_POST['preco'];
    $_SESSION['produtos'][$idProduto]['quantidade'] = $_POST['quantidade'];
    header('Location: catalogo.php'); // Redireciona para evitar reenvio do formulário
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

    <!-- Verifica se há produtos na sessão -->
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
                            <!-- Link para excluir o produto -->
                            <a href="catalogo.php?excluir=<?php echo $id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este produto?');">Excluir</a> | 
                            <!-- Link para editar o produto -->
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
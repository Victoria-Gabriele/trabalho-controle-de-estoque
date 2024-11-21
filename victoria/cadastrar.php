<?php
// Inicia a sessão
session_start();

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Verifica se a variável de sessão para produtos já existe
    if (!isset($_SESSION['produtos'])) {
        $_SESSION['produtos'] = []; // Se não existir, cria um array vazio
    }

    // Adiciona o novo produto à sessão
    $_SESSION['produtos'][] = [
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'quantidade' => $quantidade
    ];

    // Redireciona para a página de catálogo
    header('Location: catalogo.php');
    exit;
}
?>

<footer>
        <p>Desenvolvido por  <a href="https://github.com/Victoria-Gabriele">Victoria Gabriele</a>
            <br> Técnica em Desenvolvimento de Sistemas
        </p> 
</footer>
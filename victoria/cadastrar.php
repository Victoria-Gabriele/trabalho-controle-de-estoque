<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    
    if (!isset($_SESSION['produtos'])) {
        $_SESSION['produtos'] = []; 
    }

    
    $_SESSION['produtos'][] = [
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'quantidade' => $quantidade
    ];


    header('Location: catalogo.php');
    exit;
}
?>

<footer>
        <p>Desenvolvido por  <a href="https://github.com/Victoria-Gabriele">Victoria Gabriele</a>
            <br> Técnica em Desenvolvimento de Sistemas
        </p> 
</footer>

<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Exibe erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Verifica se os campos estão preenchidos
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Prepara a consulta SQL para buscar o usuário pelo email
    $stmt = $conn->prepare("SELECT senha_hash FROM usuarios WHERE email = ?");
    
    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se o email está cadastrado
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($senha_hash); // Recupera o hash da senha
        $stmt->fetch();

        // Verifica a senha fornecida com o hash armazenado
        if (password_verify($senha, $senha_hash)) {
            // Senha correta, redireciona para a página de cadastro de produto
            header("Location:../html/cadastrarProduto.html");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email não encontrado.";
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>


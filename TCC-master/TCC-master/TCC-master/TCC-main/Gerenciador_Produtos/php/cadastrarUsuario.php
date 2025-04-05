<?php
include 'conexao.php';
// Captura os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$opcao = $_POST['opcao'];


// Gera o hash da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Prepara a query para inserir os dados
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha_hash,tipousuario) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conn->error);
}

// Vincula os parâmetros e executa a query
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $opcao);

if ($stmt->execute()) {
    echo "
    <script>
                    alert('Cadastro realizado com sucesso!');
                    window.location.href = '../html/logarUsuario.html'; // Redireciona para a página de cadastro de produtos
                </script>";;
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>

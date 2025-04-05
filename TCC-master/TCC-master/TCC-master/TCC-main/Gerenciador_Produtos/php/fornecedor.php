<?php
include 'conexao.php';

try {
    // Cria a conexão PDO com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Definindo o modo de erro para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $empresa = $_POST['empresa'];
        $cpf_cnpj = $_POST['cpf/cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        // Sanitização básica dos dados (evita problemas com XSS e SQL injection)
        $nome = htmlspecialchars($nome);
        $empresa = htmlspecialchars($empresa);
        $cpf_cnpj = htmlspecialchars($cpf_cnpj);
        $telefone = htmlspecialchars($telefone);
        $email = htmlspecialchars($email);

        // Concatena as informações para o campo `Contato`
        $contato = "Empresa: $empresa, CPF/CNPJ: $cpf_cnpj, Telefone: $telefone, Email: $email";

        // SQL para inserir os dados na tabela `fornecedores`
        $sql = "INSERT INTO fornecedores (Nome, Contato, Empresa, CPF_CNPJ, Telefone, Email) 
                VALUES (:nome, :contato, :empresa, :cpf_cnpj, :telefone, :email)";

        // Prepara a consulta SQL
        $stmt = $conn->prepare($sql);

        // Liga os parâmetros da consulta com as variáveis PHP
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);

        // Executa a consulta
        $stmt->execute();

        // Exibe uma mensagem de sucesso
        echo "Fornecedor cadastrado com sucesso!";
    }
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro ao cadastrar fornecedor: " . $e->getMessage();
}

// Fecha a conexão com o banco de dados
$conn = null;
?>


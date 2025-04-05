<?php
// Conexão com o banco de dados usando PDO
$servername = "localhost";
$username = "root"; // Altere para o seu nome de usuário do MySQL
$password = ""; // Altere para a sua senha do MySQL
$dbname = "gerenciador_estoque"; // Altere para o nome do seu banco de dados

try {
    // Cria a conexão com PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query para buscar os dados dos produtos
    $query = "SELECT id, nome, preco, quantidadeEmEstoque, lote, fabricante, descricao, data_inicio FROM produtos";
    $stmt = $conn->prepare($query); // Prepara a consulta SQL
    $stmt->execute(); // Executa a consulta

    // Obter os resultados como array associativo
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($produtos)) {
        echo "Nenhum produto encontrado.";
    } else {
        // Itera pelos produtos e formata a data
        foreach ($produtos as &$produto) {
            // Verifica se a data não está vazia e formata
            if (!empty($produto['data_inicio'])) {
                $produto['data_inicio'] = date('d/m/Y', strtotime($produto['data_inicio']));
            }
        }
    }
} catch (PDOException $e) {
    // Tratamento de erros relacionados ao PDO
    die("Erro na conexão ou consulta: " . $e->getMessage());
}
?>
<?php
// Conectar ao banco de dados
$host = 'localhost'; // Alterar se necessário
$dbname = 'gerenciador_estoque';
$username = 'root';  // Alterar se necessário
$password = '';      // Alterar se necessário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';  // Nome do produto (opcional)
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : ''; // Código de barras (GTIN)
    $quantidade = isset($_POST['quantidade']) ? (int) $_POST['quantidade'] : 0;

    // Verificar se os dados são válidos
    if (($codigo == '' && $nome == '') || $quantidade <= 0) {
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    // Consultar o produto pelo nome ou código de barras
    if ($codigo) {
        // Se fornecido, busca por código de barras
        $stmt = $pdo->prepare("SELECT ID, nome, quantidadeEmEstoque, codigo FROM produtos WHERE codigo = :codigo");
        $stmt->execute(['codigo' => $codigo]);
    } else {
        // Se o código não foi fornecido, faz busca pelo nome
        $stmt = $pdo->prepare("SELECT ID, nome, quantidadeEmEstoque, codigo FROM produtos WHERE nome = :nome");
        $stmt->execute(['nome' => $nome]);
    }

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        echo "Produto não encontrado.";
        exit;
    }

    // Verificar se há estoque suficiente
    if ($produto['quantidadeEmEstoque'] < $quantidade) {
        echo "Estoque insuficiente para retirar essa quantidade.";
        exit;
    }

    // Atualizar a quantidade do produto no estoque
    $nova_quantidade = $produto['quantidadeEmEstoque'] - $quantidade;
    $stmt = $pdo->prepare("UPDATE produtos SET quantidadeEmEstoque = :nova_quantidade WHERE ID = :produto_id");
    $stmt->execute(['nova_quantidade' => $nova_quantidade, 'produto_id' => $produto['ID']]);

    // Registrar a transação de saída (se necessário para controle de estoque)
    $stmt = $pdo->prepare("INSERT INTO transacoes (IDProduto, TipoTransacao, Quantidade, Data) VALUES (:produto_id, 'saida', :quantidade, NOW())");
    $stmt->execute(['produto_id' => $produto['ID'], 'quantidade' => $quantidade]);
// Verificar se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            // Exibir um alerta em JavaScript e redirecionar para a página de cadastro
            echo "
                <script>
                    alert('Produto Cadastrado com sucesso!');
                    window.location.href = '../html/retirarProduto.html'; // Redireciona para a página de cadastro de produtos
                </script>";
        } else {
            echo "Erro ao cadastrar o produto: " . $stmt->error;
        }

        // Fechar o statement e a conexão
        $stmt->close();
        $conn->close();
   
    }

?>

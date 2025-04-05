<?php

include 'conexao.php';

// Função para calcular o dígito de verificação do GTIN-12
function calcularDigitoVerificacao($numero) {
    // Converter a string em um array de números
    $numeros = str_split($numero);
    
    $somaImpares = 0;
    $somaPares = 0;

    // Soma os números nas posições ímpares (1, 3, 5, 7, 9, 11)
    for ($i = 0; $i < 11; $i++) {
        if ($i % 2 == 0) {
            $somaImpares += $numeros[$i];
        } else {
            $somaPares += $numeros[$i];
        }
    }

    // Multiplica a soma dos ímpares por 3
    $somaImpares *= 3;

    // Soma total
    $somaTotal = $somaImpares + $somaPares;

    // Calculando o dígito de verificação
    $resto = $somaTotal % 10;
    if ($resto == 0) {
        return 0;
    } else {
        return 10 - $resto;
    }
}

// Verificar se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos estão definidos no POST
    if (isset($_POST['nome'], $_POST['lote'], $_POST['fabricante'], $_POST['validade'], $_POST['descricao'], $_POST['preco'] ,$_POST['quantidadeEmEstoque'])) {
        // Capturar os dados do formulário
        $nome = $_POST['nome'];
        $lote = $_POST['lote'];
        $fabricante = $_POST['fabricante'];
        $validade = $_POST['validade'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidadeEmEstoque = $_POST['quantidadeEmEstoque'];
        
        

        // Sanitizar os dados para evitar qualquer entrada maliciosa
        // Usamos apenas htmlspecialchars para proteger contra XSS
        $nome = htmlspecialchars($nome);
        $lote = htmlspecialchars($lote);
        $fabricante = htmlspecialchars($fabricante);
        $validade = htmlspecialchars($validade);
        $descricao = htmlspecialchars($descricao);
        $preco = htmlspecialchars($preco);
        $quantidadeEmEstoque = (int) $quantidadeEmEstoque; // Garantir que seja um inteiro
    

        // Gerar um número de 11 dígitos aleatórios
        $numeroBase = str_pad(rand(10000000000, 99999999999), 11, '0', STR_PAD_LEFT);

        // Calcular o dígito de verificação usando o algoritmo de Luhn
        $digitoVerificacao = calcularDigitoVerificacao($numeroBase);

        // Concatenar o número base com o dígito de verificação
        $codigo = $numeroBase . $digitoVerificacao;

        // Preparar a consulta SQL
        $stmt = $conn->prepare("INSERT INTO produtos (nome, lote, fabricante, validade, descricao, preco, codigo, quantidadeEmEstoque) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Verificar se a preparação foi bem-sucedida
        if ($stmt === false) {
            // Se a preparação falhou, mostrar o erro
            die('Erro na preparação da consulta: ' . $conn->error);
        }

        // Corrigir o bind_param para garantir que os tipos estão corretos
        $stmt->bind_param("sssssssi", $nome, $lote, $fabricante, $validade, $descricao, $preco, $codigo, $quantidadeEmEstoque,);

        // Verificar se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            // Exibir um alerta em JavaScript e redirecionar para a página de cadastro
            echo "
                <script>
                    alert('Produto Cadastrado com sucesso!');
                    window.location.href = '../html/cadastrarProduto.html'; // Redireciona para a página de cadastro de produtos
                </script>";
        } else {
            echo "Erro ao cadastrar o produto: " . $stmt->error;
        }

        // Fechar o statement e a conexão
        $stmt->close();
        $conn->close();
    } else {
        // Se algum campo estiver ausente, mostrar um erro
        echo "Erro: Campos obrigatórios não preenchidos!";
    }
}

?>

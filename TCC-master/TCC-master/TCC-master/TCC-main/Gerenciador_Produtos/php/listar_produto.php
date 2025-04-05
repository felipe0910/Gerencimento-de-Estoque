<?php
include 'conexao.php'; // Conexão com o banco


// Lê e decodifica o JSON recebido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Acessando dados do JSON
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['action']) && isset($data['produtoId'])) {
        $action = $data['action'];
        $produtoId = $data['produtoId'];

        if ($action === 'editar') {
            if (isset($data['nome']) && isset($data['fabricante']) && isset($data['validade'])) {
                $produto = $data['nome'];
                $fabricante = $data['fabricante'];
                $validade = $data['validade'];

                // Atualizando o produto no banco
                $sql = "UPDATE produtos SET nome = ?, fabricante = ?, validade = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $produto, $fabricante, $validade, $produtoId);

                if ($stmt->execute()) {
                    echo json_encode(['status' => 'success', 'message' => 'Produto atualizado com sucesso!']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar o produto.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Faltam dados para editar o produto.']);
            }
        } elseif ($action === 'excluir') {
            $sql = "DELETE FROM produtos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $produtoId);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Produto excluído com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao excluir o produto.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Ação inválida.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dados da requisição ausentes.']);
    }
}

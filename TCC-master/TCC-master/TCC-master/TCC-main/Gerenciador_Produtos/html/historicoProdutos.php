<?php

include'../php/listarHistorico.php'

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela de Produtos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="../Js/mudarTemas.js"></script>
  <link rel="stylesheet" href="../php/listarHistorico.php">
  
  <style>
 
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: white;
            background-color: rgb(80, 80, 80);
            font-family: Arial, sans-serif;
           
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 73px;
            height: 90%;
            width: 80px; /* Largura da barra lateral */
            background-color: #333;
            padding-top: -100px;
            color: rgba(255, 255, 255, 0.813);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centraliza verticalmente os itens */
            align-items: center; /* Centraliza horizontalmente os itens */
           
           
        }
 
        .sidebar a {
            padding: 10px;
            text-decoration: none;
            color: white;
            display: block;
            margin-bottom: 10px; /* Espaço entre os links */
            font-size: 10px;
            text-align: center;
           
        }
 
        /* Estilos para a barra de navegação horizontal */
        .navbar {
            position: fixed;
            top: 0;
            height: 63px;
            width: 100%;
            background-color: #3e3e3e;/*cabeçalho*/
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
           
           
        }
 
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            font-size: 13px;
            transform: -100px !important;
           
        }
 
        .navbar a:first-child {
            margin-right: auto; /* Empurra o primeiro link para a esquerda */
        }
 
     
 
        /* Estilo para o link de imagem */
        .navbar img {
            height: 40px; /* Altura da imagem */
            margin-right: 2px; /* Espaço à direita da imagem */
            width: 30px;
            height: 30px;
 
           
        }
        .img_logo img {
            height: 50px; /* Altura da imagem */
            margin-right: 100px; /* Espaço à direita da imagem */
            width: 50px;
 
 
        }
 
       
 
 
       
       
        .sidebar img {
            width: 37px; /* Redimensiona a largura da imagem para 80% do tamanho do container pai (.sidebar) */
            height: auto; /* Mantém a proporção da altura automaticamente */
            display: block; /* Remove espaços extras ao redor da imagem */
            margin-bottom:5px; /* Espaçamento abaixo da imagem */
            padding-left: 13px;
            margin-top: 15px;
           
        }
        .image-link {
            display: inline-block;
            text-decoration: none;
            border: 2px solid #333;
            padding: 5px;
            transition: transform 0.3s ease;
        }
 
/* Estilos específicos para a tabela */
table {
  width: 100%;
  margin: 100px auto;
  border-collapse: collapse;
  background-color: #444;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
  color: #f3f3f3;
}
 
th, td {
  padding: 20px 15px;
  text-align: left;
  font-size: 16px;
}
 
th {
  background-color: #555;
  color: #ddd;
  font-weight: bold;
  text-transform: uppercase;
  font-size: 14px;
}
 
td {
  background-color: #333;
}
 
button {
  background-color: #3498db;
  color: white;
  padding: 8px 16px;
  margin: 0 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-size: 14px;
}
 
.ww{
    background-color: #db1010;
  color: white;
  padding: 8px 16px;
  margin: 0 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-size: 14px;  
}
button:hover {
  background-color: #c2c1c1;
  ;
}
 
.ww:hover{
    background-color: #c2c1c1;
}
 
tr:hover td {
  background-color: #3e3e3e;
}
 
 
    .sidebar a:hover span  {
           
            color: #c2c1c1;
           
                    }
       
                    .sidebar a img:hover{
                        transform: scale(1.1); /* Aumenta o ícone levemente */
                        transition: 0.3s; /* Suaviza a transição */
                        opacity: 0.8; /* Torna o ícone levemente transparente ao passar o mouse */
                        color: #333;
       
                    }
       
       
       
       
                .navbar h1{
                    margin-top: -10%;
                    font-size: 20px;
                    margin-left: 100px;
                    font-family: Tahoma, Verdana, sans-serif;
       
                }
       
                .navbar a:hover span {
            color: #c2c1c1; /* Muda a cor do texto */
        }
       
        .navbar a img:hover {
           
       
        opacity: 0.8; /* Torna o ícone levemente transparente ao passar o mouse */
            color: #333;
            transform: scale(1.1); /* Aumenta o ícone levemente */
        transition: 0.3s; /* Suaviza a transição */
        }
 
    /* Estilos da Tabela */
    table {
      width: 80%;
      margin: 100px auto;
      border-collapse: collapse;
      background-color: #444;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
      color: #f3f3f3;
    }
 
    th, td {
      padding: 20px 15px;
      text-align: left;
      font-size: 16px;
    }
 
    th {
      background-color: #555;
      color: #ddd;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
    }
 
    td {
      background-color: #333;
    }
 
    /* Estilos do botão */
    button {
      background-color: #3498db;
      color: white;
      padding: 8px 16px;
      margin: 0 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
 
    .ww {
      background-color: #db1010;
      color: white;
      padding: 8px 16px;
      margin: 0 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
 
    button:hover, .ww:hover {
      background-color: #c2c1c1;
    }
 
    tr:hover td {
      background-color: #3e3e3e;
    }
 
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
 
    .modal-content {
      background-color: #444;
      padding: 20px;
      border-radius: 8px;
      color: white;
      width: 50%;
      text-align: center;
    }
 
    .modal button {
      margin: 10px;
    }
 
    .close {
      color: white;
      font-size: 30px;
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }
 
    .form-group {
      margin-bottom: 10px;
    }
 
    .form-group input {
      padding: 8px;
      width: 100%;
    }

    .input-group{
    display: flex;
    align-items: center;
    background-color: #3e3e3e;
    padding: 9px;
    border-radius: 10px;
    gap: 8px;

}
.input-icon{
    min-width: 32px;
    min-height: 32px;
    align-items: center;
    display: flex;
    border-radius: 100%;
    filter: invert(0.89);
    transform:translateY(-3px)
    translate(45px)
    
    
}
.input-field{
    width: 200px;
    height: 20px;
    border: none;
    border-radius: 7px;
    margin-top: -10px;
    

}
table {
            border-collapse: collapse;
            width: auto;
            height: 10px;
            overflow: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 1px;
            height: 10px;
            width: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
/* Tema Claro */
body.light-mode {
    background-color: rgb(196, 196, 196);
    color: #333;
}
.container-search.ligth-mode{
background-color: #c2c1c1;
color: #000;
}

/* Tema Claro para .content_form */
.content_form.light-mode {
    background-color: #e9e9e9;
    color: #000000;
    border: 1px solid #000000;

}
.content_form.light-mode legend{
    color: #000;
    border: #000;
}

/* Tema Claro para .content_table */
.content_table.light-mode {
    background-color: #f9f9f9;
    color: #000000;
    border: 1px solid #000000;
}

/* Ajuste geral para tabelas */
.content_table.light-mode th, 
.content_table.light-mode td {
    border: 1px solid #000000;
}


/* Tema Claro - Barra Lateral e Barra de Navegação */
.sidebar.light-mode {
    background-color: rgb(175, 175, 175);
    color: #ffffff;
    
}
.sidebar.light-mode img {
    filter: invert(1); /* Inverte as cores da imagem */
    transition: filter 0.3s ease; /* Suaviza a transição */
}

.sidebar.light-mode a {
    color: #000000;
}

.sidebar.light-mode a:hover span {
    color: #6d6d6d;
}

.navbar.light-mode {
    background-color: rgb(175, 175, 175);
    color: #000;
}
.navbar.light-mode img{
    filter: invert(1);
    transition: filter 0.3s ease;

}.navbar.light-mode a img{
    filter: invert(1);
    transition: filter 0.3s ease;

}
/* Tema Claro - Estilo para o container da barra de pesquisa */
.container-search.light-mode {
    background-color: rgb(175, 175, 175); /* Fundo branco no tema claro */
    color: #000000; /* Texto preto no tema claro */
    
}

/* Tema Claro - Estilo para a barra de pesquisa */
.input-group.light-mode {
    background-color: rgb(175, 175, 175); /* Fundo claro */
    
}

/* Tema Claro - Ícone da barra de pesquisa */
.input-icon.light-mode {
    
    filter: invert(-1);
}

.navbar.light-mode a {
    color: #333;
}

.navbar.light-mode a:hover {
    color: #666;
}

.navbar.light-mode .img_logo img {
    filter: brightness(0.7); /* Ajusta a imagem no tema claro */
    filter: invert(1);
    cursor: pointer;
}
.container-search {
    position: relative; /* Adicionado para garantir que as sugestões se posicionem corretamente em relação a este contêiner */
    z-index: 10; /* Garante que o campo de pesquisa fique acima dos outros elementos */
}
.suggestions {
    border: 1px solid #ccc;
    max-height: 150px;
    overflow-y: auto;
    background-color: white;
    position: absolute;
    width: 200px;
    z-index: 1000;
    display: none; /* Inicialmente escondido */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 5px;
    border-radius: 8px;
    transform: translateY(-15px);
    color: #000;
    margin-left: 50px;

}

.suggestions div {
    padding: 1px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 14px;
    transform: translateY(-1px);
}

.suggestions div:hover {
    background-color: #f0f0f0;
    color: #000;
}
.input-group {
    display: flex;
    align-items: center;
    background-color: #3e3e3e;
    padding: 9px;
    border-radius: 10px;
    gap: 8px;
    position: relative; /* Para garantir que o conteúdo da pesquisa se posicione corretamente */
}




  </style>
</head>
<body>
  <!-- Barra de navegação lateral -->
  <div class="sidebar">
    <a href="../html/listar_produtos.html"><img src="../imagenss/caracteristicas (2).png" alt="listarProduto">
    <span>Listar Produtos</span></a>
    <a href="../html/cadastrarProduto.html"><img src="../imagenss/adicionar-produto.png"alt="adicionarProduto">
    <span>Cadastrar Produtos</span></a>
    <a href="../html/retirarProduto.html"><img src="../imagenss/excluir-produto.png" alt="excluirProduto">
    <span>Retirar  Produtos</span></a>
    <a href="../html/fornecedor.html"><img src="../imagenss/entregador.png" alt="cadastrarFornecedor">
    <span>Cadastrar Fornecedor</span></a>
</div>



<!-- Barra de navegação horizontal -->
<div class="navbar">
    <a class="img_logo">
        <img src="../html/imagens/logo_1.jfif"><h1>Gerenciamento de Estoque</h1 alt="Logo Projeto">
    </a>

    <div class="container-search">
        <div  class="input-group">
            <div class="input-icon">
                <i  id="input-icon" class="fa-solid fa-magnifying-glass"></i>
            </div>

            <input id="search" 
            type="text" 
            class="input-field" 
            placeholder="       Pesquisar"
            autocomplete="off">
            
        </div>
        <div id="suggestions" class="suggestions"></div>
    </div>


    <a href="../html/index.html"><img src="../imagenss/botao-home (1).png" alt="home"><br><span>Inicio</span></a>
        <a href="#"><img src="../html/imagens/perfil.1.png" alt="perfil"><br><span>Perfil</span></a>
        <a href="../html/landing.page.html"><img src="../imagenss/botao-de-informacao.png" alt="informacao"><br><span>Sobre</span></a>
        <!-- Adicione mais links conforme necessário -->
        <a  id="toggle-theme"  >
            <img src="../imagenss/pretoEbranco.png" alt="pretoEbranco"><br><span>Tema</span>
        </a>
        </div>
        <div class="content_form">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Lote</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Entrada</th>
                <th>Saída</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['id']) ?></td>
                        <td><?= htmlspecialchars($produto['nome']) ?></td>
                        <td><?= htmlspecialchars($produto['quantidadeEmEstoque']) ?></td>
                        <td><?= htmlspecialchars($produto['lote']) ?></td>
                        <td><?= htmlspecialchars($produto['descricao']) ?></td>
                        <td><?= htmlspecialchars(number_format($produto['preco'], 2, ',', '.')) ?></td>
                        <td>
                            <?= !empty($produto['data_inicio']) && strtotime($produto['data_inicio']) 
                                ? htmlspecialchars(date('d/m/Y', strtotime($produto['data_inicio']))) 
                                : 'Data inválida' ?>
                        </td>
                        <td>
                            <?= !empty($produto['data_saida']) 
                                ? htmlspecialchars(date('d/m/Y', strtotime($produto['data_saida']))) 
                                : 'N/A' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center;">Nenhum produto encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


  <script>
  const pages = {
      "cadastro": "../html/cadastrarProduto.html",
      "cadastrar": "../html/cadastrarProduto.html",
      "cadastrar produto": "../html/cadastrarProduto.html",
      "criar produto": "../html/cadastrarProduto.html",
      "listar": "../html/listar_produtos.html",
      "listar produto": "../html/listar_produtos.html",
      "listar produtos": "../html/listar_produtos.html",
      "lista": "../html/listar_produtos.html",
      "retirar": "../html/retirarProduto.html",
      "retira": "../html/retirarProduto.html",
      "retirar produto": "../html/retirarProduto.html",
      "fornecedor": "../html/fornecedor.html",
      "cadastrar fornecedor": "../html/fornecedor.html",
      "fornecedo": "../html/fornecedor.html",
      "criar fornecedor": "../html/fornecedor.html",
      "inicio": "../html/index.html",
      "inici": "../html/index.html",
      "home": "../html/index.html",
      "tela inicio": "../html/index.html",
      "sobre": "../html/landing.page.html",
      "sobre o site": "../html/landing.page.html",
      "sobre o software": "../html/landing.page.html",
      "historico": "../historicoProdutos.php",
      "historico de produtos": "../html/historicoProdutos.html",
      "historicodeprodutos": "../html/historicoProdutos.html",
      "historicodeproduto": "../html/historicoProdutos.html",
      "historico de produto": "../html/historicoProdutos.html",
  };

  const searchInput = document.getElementById('search');
  const suggestionsContainer = document.getElementById('suggestions');

  // Evento de digitação
  searchInput.addEventListener('input', () => {
      const query = searchInput.value.toLowerCase().trim();
      suggestionsContainer.innerHTML = ''; // Limpa sugestões anteriores

      if (query) {
          const matchingPages = Object.keys(pages).filter(page =>
              page.toLowerCase().includes(query)
          );

          if (matchingPages.length > 0) {
              suggestionsContainer.style.display = 'block'; // Exibe a lista
              matchingPages.forEach(page => {
                  const suggestion = document.createElement('div');
                  suggestion.textContent = page;
                  suggestion.addEventListener('click', () => {
                      window.location.href = pages[page]; // Redireciona ao clicar
                  });
                  suggestionsContainer.appendChild(suggestion);
              });
          } else {
              suggestionsContainer.style.display = 'none'; // Esconde se não houver resultados
          }
      } else {
          suggestionsContainer.style.display = 'none'; // Esconde se o campo estiver vazio
      }
  });

  // Redireciona ao pressionar Enter
  searchInput.addEventListener('keydown', (event) => {
      if (event.key === 'Enter') {
          const query = searchInput.value.toLowerCase().trim();
          if (pages[query]) {
              window.location.href = pages[query];
          } else {
              alert('Página não encontrada.');
          }
      }
  });

  // Esconde sugestões ao clicar fora
  document.addEventListener('click', (e) => {
      if (!e.target.closest('.container-search')) {
          suggestionsContainer.style.display = 'none';
      }
  });
</script>
</body>

</html>

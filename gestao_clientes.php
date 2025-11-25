<?php
include("conexao.php"); 

// Consulta SQL para buscar nome, CPF e e-mail dos clientes

$sql = "SELECT * FROM Clientes";
$resultado = $conexao->query($sql);

// CADASTRO DE CLIENTE
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $Telefone = $_POST['Telefone'];
    $email = $_POST['email'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];

    $sql = "INSERT INTO Clientes (Nome_Cliente, CPF_Cliente, Telefone, Email,  Rua, Numero, Complemento, Bairro, Cidade, UF, CEP) 
    VALUES ('$nome', '$cpf', '$Telefone','$email',  '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep'
    )";
     $conexao->query($sql);
}


// BUSCA POR NOME
$nome = "";
if (isset($_POST['buscar'])) {
    $nome = $_POST['nome'];
    $sql = "SELECT * FROM Clientes WHERE Nome_Cliente LIKE '%$nome%'";
    $resultado = $conexao->query($sql);
} else {
    $sql = "SELECT * FROM Clientes";
    $resultado = $conexao->query($sql);
}
?>

<form method="POST" action="gestao_clientes.php">
    <label>Buscar cliente por nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>">
    <input type="submit" name="buscar" value="Buscar">
</form>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Rua</th>
        <th>Numero</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>UF</th>
        <th>CEP</th>
		
    </tr>
    <?php
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $linha["Nome_Cliente"] . "</td>";
            echo "<td>" . $linha["CPF_Cliente"] . "</td>";
            echo "<td>" . $linha["Telefone"] . "</td>";
            echo "<td>" . $linha["Email"] . "</td>";
            echo "<td>" . $linha["Rua"] . "</td>";
            echo "<td>" . $linha["Numero"] . "</td>";
            echo "<td>" . $linha["Complemento"] . "</td>";
            echo "<td>" . $linha["Bairro"] . "</td>";
            echo "<td>" . $linha["Cidade"] . "</td>";
            echo "<td>" . $linha["UF"] . "</td>";
            echo "<td>" . $linha["CEP"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum cliente encontrado.</td></tr>";
    }




// Deletar produto
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $conexao->query("DELETE FROM Produtos WHERE id_Produto = $id");
}

// Buscar produto para edição
$produtoEditado = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $resultadoEdicao = $conexao->query("SELECT * FROM Produtos WHERE id_Produto = $id");
    $produtoEditado = $resultadoEdicao->fetch_assoc();
}


// Atualizar produto
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "UPDATE Produtos SET 
        Produto='$produto', Descricao_Produto='$descricao', Categoria_Produto='$categoria',
        Valor_Produto='$valor', Imagem_Produto='$imagem', Disponivel='$disponivel'
        WHERE id_Produto = $id";

    $conexao->query($sql);
}


// Cadastrar novo produto
if (isset($_POST['cadastrar'])) {
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "INSERT INTO Produtos (
        Produto, Descricao_Produto, Categoria_Produto, Valor_Produto, Imagem_Produto, Disponivel
    ) VALUES (
        '$produto', '$descricao', '$categoria', '$valor', '$imagem', '$disponivel'
    )";

    $conexao->query($sql);
}


// Busca por nome de produto
$produtoBuscado = "";
if (isset($_POST['buscar'])) {
    $produtoBuscado = $_POST['produto_busca'];
    $sql = "SELECT * FROM Produtos WHERE Produto LIKE '%$produtoBuscado%'";
    $resultado = $conexao->query($sql);
} else {
    $sql = "SELECT * FROM Produtos";
    $resultado = $conexao->query($sql);
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestão de Clientes</title>
</head>

<body>

<h1>Gestão de Clientes</h1>

    <!-- LISTAGEM DE CLIENTES -->
    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["Nome_Cliente"] . "</td>";
                echo "<td>" . $linha["CPF_Cliente"] . "</td>";
                echo "<td>" . $linha["Telefone"] . "</td>";
                echo "<td>" . $linha["Email"] . "</td>";
                echo "<td>" . $linha["Rua"] . "</td>";
                echo "<td>" . $linha["Numero"] . "</td>";
                echo "<td>" . $linha["Complemento"] . "</td>";
                echo "<td>" . $linha["Bairro"] . "</td>";
                echo "<td>" . $linha["Cidade"] . "</td>";
                echo "<td>" . $linha["UF"] . "</td>";
                echo "<td>" . $linha["CEP"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>Nenhum cliente encontrado.</td></tr>";
        }
        ?>
    </table>




<!-- FORMULÁRIO DE CADASTRO -->
    
<h2>Cadastrar Novo Cliente</h2>
    
<form method="POST" action="gestao_clientes.php">
        <label>Nome:</label><br>
        <input type="text" name="nome"><br><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf"><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br><br>

        <label>Rua:</label><br>
        <input type="text" name="rua"><br><br>

        <label>Número:</label><br>
        <input type="text" name="numero"><br><br>

        <label>Complemento:</label><br>
        <input type="text" name="complemento"><br><br>

        <label>Bairro:</label><br>
        <input type="text" name="bairro"><br><br>

        <label>Cidade:</label><br>
        <input type="text" name="cidade"><br><br>

        <label>UF:</label><br>
        <input type="text" name="uf" maxlength="2"><br><br>

        <label>CEP:</label><br>
        <input type="text" name="cep"><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <hr>


    <!-- Formulário de Busca -->
    <h2>Buscar Produto por Nome</h2>
    <form method="POST" action="gestao_produtos.php">
        <input type="text" name="produto_busca" value="<?php echo $produtoBuscado; ?>">
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <hr>

<h1>Gestão de Produtos</h1>

       <!-- FORMULÁRIO DE CADASTRO DE PRODUTOS-->
    
       <h2>Cadastrar Novo Produto</h2>
   
       <form method="POST" action="gestao_produtos.php">
        <label>Nome do Produto:</label><br>
        <input type="text" name="produto"><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria"><br><br>

        <label>Valor (R$):</label><br>
        <input type="text" name="valor"><br><br>

        <label>Imagem (URL ou nome do arquivo):</label><br>
        <input type="text" name="imagem"><br><br>

        <label>Disponível:</label>
        <input type="checkbox" name="disponivel" checked><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar Produto">
    </form>

    <hr>

   
<!-- LISTAGEM DE PRODUTOS -->
    <h2>Lista de Produtos</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Imagem</th>
            <th>Disponível</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["Produto"] . "</td>";
                echo "<td>" . $linha["Descricao_Produto"] . "</td>";
                echo "<td>" . $linha["Categoria_Produto"] . "</td>";
                echo "<td>R$ " . number_format($linha["Valor_Produto"], 2, ',', '.') . "</td>";
                echo "<td>" . $linha["Imagem_Produto"] . "</td>";
                echo "<td>" . ($linha["Disponivel"] ? "Sim" : "Não") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
        }
        ?>
    </table>

</body>
</html>


<?php
$conexao->close(); // Fecha a conexão com o banco
?>

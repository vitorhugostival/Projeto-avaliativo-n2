<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>  	
    <h1>Compras</h1>
    <form action="cadastro1.php" method="POST">
        <label for="fornecedor">Fornecedor: </label>
        <input type="text" name="fornecedor">
        <br>
        <label for="produto">Produto: </label>
        <input type="text" name="produto">
        <br>
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade">
        <br>
       <button type="submit">Salvar</button>
    </form>
    <br>  
    <form action="delet1.php" method="POST">
        <label for="deletar">Digite o produnto que vc quer excluir</label>
        <input type="text" name="deletar" ID="deletar" placeholder="Excluir">
        <input type="submit" value="Excluir ID" onclick="return confirm('Deseja realmente excluir o Produto?');">
    </form>
    
    <br>

    <a href = "atualizacaodecompras.php">Atulizar Dados nas Compras</a>
    
    <br>

    <br>
    
    <a href = "pesquisar1.html">Pesquisar os produntos das Compras</a>
    
    <br>

    <?php
    include("conexao.php");

    $sql = "SELECT fornecedor, produto, quantidade FROM compras";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table'><thead><tr><th>Fornecedor</th><th>Produto</th><th>Quantidade</th></tr></thead><tbody>";
        
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr><td>".$row['fornecedor']."</td>
            <td>".$row['produto']."</td>
            <td>".$row['quantidade']."</td></tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Zero Resultados";
    }

    mysqli_close($conexao);
?>

</body>
</html>
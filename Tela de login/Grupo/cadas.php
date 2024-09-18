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
    <form action="cadastro.php" method="POST">
        <label for="ID">ID: </label>
        <input type="number" name="ID">
        <br>
        <label for="nome">Nome: </label>
        <input type="text" name="nome">
        <br>
        <label for="tipo">Tipo de Local: </label>
        <input type="text" name="tipo">
        <br>
       <button type="submit">Salvar</button>
    </form>
    <br>  
    <form action="delet.php" method="POST">
        <label for="deletar">Digite o ID do produto que você quer excluir</label>
        <input type="text" name="deletar" id="deletar" placeholder="Excluir">
        <input type="submit" value="Excluir ID" onclick="return confirm('Deseja realmente excluir o Produto?');">
    </form>
    
    <br>

    <a href="atualizacaodegrupo.php">Atualizar</a>
    
    <br>
    
    <a href="pesquisar.html">Pesquisar</a>
    
    <br>

    <?php
    include("conexao.php");

    $sql = "SELECT ID, nome, tipo FROM grupo";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table'><thead><tr><th>ID</th><th>Nome</th><th>Tipo de Local</th></tr></thead><tbody>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr><td>".$row['ID']."</td>
            <td>".$row['nome']."</td>
            <td>".$row['tipo']."</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Zero Resultados";
    }

    mysqli_close($conexao);
    ?>

</body>
</html>

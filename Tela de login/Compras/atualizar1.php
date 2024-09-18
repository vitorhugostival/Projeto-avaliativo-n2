<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    

<?php
    include('conexao.php');
     
    $fornecedor = $_POST['NOVOfornecedor'];
    $produto = $_POST['NOVOproduto'];
    $quantidade = $_POST['NOVOquantidade'];

    // Atualiza os dados no banco de dados
    $stmt = $conexao->prepare("UPDATE compras SET produto = ?, quantidade = ? WHERE fornecedor = ?");
    $stmt->bind_param("sis", $produto, $quantidade, $fornecedor);

    if ($stmt->execute()) {
        echo "Dados atualizados no estoque.<br><br>";
    } else {
        echo "Erro na atualização do estoque: " . $stmt->error;
    }

    $stmt->close();

    // Seleciona e exibe os dados atualizados
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

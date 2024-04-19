<!DOCTYPE html>

<html lang="pt-br">

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <script type="module" src="index.js"></script>
    <title>tela inicial</title>
</head>

<body>



<?php
require_once 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo_produto'];
    $estoque = $_POST['estoq_produto'];
    $produto = $_POST['produto'];
    $data = $_POST['data_compra'];
    $valor = $_POST['valor_compra'];
    $quantidade = $_POST['quantidade_comprada'];
    $pagamento = $_POST['forma_pagamento'];
    $status = $_POST['status_compra'];
    $estado = $_POST['estado_comp'];
   


		try {
		
		
        $inserir = $conexao->prepare("INSERT INTO produtos
         (codigo_produto, estoq_produto, produto, data_compra, valor_compra, quantidade_comprada,forma_pagamento,status_compra,estado_comp ) VALUES (:codigo_produto, :estoq_produto, :produto, :data_compra, :valor_compra, :quantidade_comprada,:forma_pagamento,:status_compra,:estado_comp )");

       
        $inserir->bindValue(':codigo_produto',$codigo);
        $inserir->bindValue(':estoq_produto',$estoque);
        $inserir->bindValue(':produto',$produto);
        $inserir->bindValue(':data_compra',$data);
        $inserir->bindValue(':valor_compra',$valor);
        $inserir->bindValue(':quantidade_comprada',$quantidade);
        $inserir->bindValue(':forma_pagamento',$pagamento);       
        $inserir->bindValue(':status_compra',$status);
        $inserir->bindValue(':estado_comp',$estado);
       

    
        


	    if ($inserir->execute()) {
		
            echo "Dados inseridos no Banco de Dados com sucesso!<br/>";
        } else {
		
            echo "Erro ao inserir os dados: " . $inserir->errorInfo()[2];
        }

        $inserir = null;
		
		
    } catch(PDOException $e) {
        echo "Erro ao inserir os dados: " . $e->getMessage();
    }

}  

$conexao = null;
?>

</body>

</html>

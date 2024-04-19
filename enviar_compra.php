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
    $cpf = $_POST['cpf'];
    $codigo = $_POST['codigo_venda'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $produto = $_POST['produto'];
    $data = $_POST['data_compra'];
    $pagamento = $_POST['forma_pagamento'];
    $status = $_POST['status_compra'];
    $estado = $_POST['estado'];
   


		try {
		
		
        $inserir = $conexao->prepare("INSERT INTO compras
         (cpf,codigo_venda,quantidade,valor,produto,data_compra,forma_pagamento,status_compra,estado ) VALUES 
         (:cpf,:codigo_venda,:quantidade,:valor,:produto,:data_compra,:forma_pagamento,:status_compra,:estado)");

        
        $inserir->bindValue(':cpf',$cpf);
        $inserir->bindValue(':codigo_venda',$codigo);
        $inserir->bindValue(':quantidade',$quantidade);
        $inserir->bindValue(':valor',$valor);
        $inserir->bindValue(':produto',$produto);
        $inserir->bindValue(':data_compra',$data);
        $inserir->bindValue(':forma_pagamento',$pagamento);
        $inserir->bindValue(':status_compra',$status);
        $inserir->bindValue(':estado',$estado);
       

    
        


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

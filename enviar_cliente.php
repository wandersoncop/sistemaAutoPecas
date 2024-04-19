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
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
   


		try {
		
		
        $inserir = $conexao->prepare("INSERT INTO clientes (cpf,nome,nascimento,telefone,email,sexo,cep,rua,numero,bairro,cidade,estado ) 
        VALUES (:cpf,:nome,:nascimento,:telefone,:email,:sexo,:cep,:rua,:numero,:bairro,:cidade,:estado)");

        
        $inserir->bindValue(':cpf',$cpf);
        $inserir->bindValue(':nome',$nome);
        $inserir->bindValue(':nascimento',$nascimento);
        $inserir->bindValue(':telefone',$telefone);
        $inserir->bindValue(':email',$email);
        $inserir->bindValue(':sexo',$sexo);
        $inserir->bindValue(':cep',$cep);
        $inserir->bindValue(':rua',$rua);
        $inserir->bindValue(':numero',$numero);
        $inserir->bindValue(':bairro',$bairro);
        $inserir->bindValue(':cidade',$cidade);
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

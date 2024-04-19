<!DOCTYPE html>

<html lang="pt-br">

<head>
               
			   <meta name="author" content="Wanderley Lopes Batista">    
               <meta charset="UTF-8">
	           <title>Cadastro de Aluno</title>
			   
			   <link rel="stylesheet" type="text/css" href="css/estilo.css" />     
			       
	           <title>Cadastro de Aluno</title>
</head>

<body>



<ul class="menu">

    <li class="menu-item">
        <a href="index.html">PÁGINA INICIAL</a>
    </li>
  
    <li class="menu-item">
        <a href="cadastro_aluno.html">CADASTRAR ALUNO</a>
     </li>
	 
	 <li class="menu-item">
        <a href="consulta_geral_aluno.php">CONSULTA GERAL ALUNO</a>
     </li>

     <li class="menu-item">
        <a href="consulta_letra_aluno.php">CONSULTA  ALUNO 1ª LETRA</a>
     </li>

     <li class="menu-item">
     <a href="editar_aluno.php">EDITAR</a>
     </li>
	
	<li class="menu-item">
        <a href="excluir_aluno.php">EXCLUIR</a>
    </li>
     
     </ul>
 
 <br>

<?php
require_once 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['aluno'];
    $data_nasc = $_POST['data'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];


		try {
		
		
        $inserir = $conexao->prepare("INSERT INTO aluno (nome, data_nasc, sexo, cpf, endereco, complemento, cep, bairro, cidade, estado, telefone) 
                                 VALUES (:nome, :data_nasc, :sexo, :cpf, :endereco, :complemento, :cep, :bairro, :cidade, :estado, :telefone)");

        
        $inserir->bindValue(':nome', $nome);
        $inserir->bindValue(':data_nasc', $data_nasc);
        $inserir->bindValue(':sexo', $sexo);
        $inserir->bindValue(':cpf', $cpf);
        $inserir->bindValue(':endereco', $endereco);
        $inserir->bindValue(':complemento', $complemento);
        $inserir->bindValue(':cep', $cep);
        $inserir->bindValue(':bairro', $bairro);
        $inserir->bindValue(':cidade', $cidade);
        $inserir->bindValue(':estado', $estado);
        $inserir->bindValue(':telefone', $telefone);


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
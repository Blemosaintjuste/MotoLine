<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro De Cliente</title>
    <style>        
    #contato{
        height: px;
        background-color:rgba(120,39,200,0.4);
    }
    #dadospessoais{
        float:left;
        width:45%;
        height:120px;
        background-color:#f5e6ab;
        
        }
    #localização{
        width:96%;
        background-color:#f5e6ab;
    }
    #salvar{
        background-color:#1ed14b;

    }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="#">
    <fieldset id="dadospessoais">
        <legend>Dados Pessoais</legend>
        <input type="text" name="cpf" placeholder="CPF" required><br>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="radio" name="sexo" id="masc" value="M" tabindex="1">
        <label for="masc">Masculino</label><br>
        <input type="radio" name="sexo" id="fem" value="F" tabindex="2">
        <label for="fem">Feminino</label><br>
    </fieldset>
    <fieldset id="contato">
        <legend>Contato</legend>
        <input type="text" name="fone" placeholder="Fone"><br>
        <input type="text" name="whatsapp" placeholder="Whatsapp"><br>
        <input type="email" name="email" placeholder="E-mail"><br>
    </fieldset>
    <fieldset id="localização">
        <legend>Localização</legend>
        <select name="estado"><br>
                <option hidden>Escolha um estado</option><br>
                <option value="RS">Rio Grande do Sul</option>
                <option value="SC">Santa catalina</option>
                <option value="PR">Parana</option>
            </select><br>
        <input type="text" name="cidade" placeholder="Cidade"><br>
        <input type="text" name="bairo" placeholder="Bairo"><br>
        <input type="text" name="rua" placeholder="Rua"><br>
        <input type="text" name="numero" placeholder="Numero"><br>
    </fieldset>
    <input type="submit" value="Salvar Cliente" name="salvar" id="salvar">
    </form>
<?php
    if (isset($_POST['salvar'])){
		$cpf        =$_POST['cpf']; 
		$nome       =$_POST['nome'];
		$sexo  		=$_POST['sexo'];
		$estado     =$_POST['estado'];
		$cidade     =$_POST['cidade']; 
		$bairro      =$_POST['bairo']; 
		$rua        =$_POST['rua'];    
		$numero     =$_POST['numero']; 
		$fone      =$_POST['fone'];
		$email      =$_POST['email'];
		$whatsApp   =$_POST['whatsapp'];
        include 'connection.php';

        $sql="INSERT INTO cliente(cpf,nome,sexo,estado,cidade,bairro,rua,numero,fone,email,whatsApp)
            VALUE(:cpf,:nome,:sexo,:estado,:cidade,:bairro,:rua,:numero,:fone,:email,:whatsApp)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);
        $stmt->bindParam(':sexo',$sexo,PDO::PARAM_STR);
        $stmt->bindParam(':estado',$estado,PDO::PARAM_STR);
        $stmt->bindParam(':cidade',$cidade,PDO::PARAM_STR);
        $stmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
        $stmt->bindParam(':rua',$rua,PDO::PARAM_STR);
        $stmt->bindParam(':numero',$numero,PDO::PARAM_STR);
        $stmt->bindParam(':fone',$fone,PDO::PARAM_STR);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':whatsApp',$whatsApp,PDO::PARAM_STR);
        $resultado=$stmt->execute();
        if(!$resultado){
            var_dump($stmt->errorInfo());
            exit;    
        }else{
            echo $stmt->rowCount()."linhas inseridas";
        }
    }
?>
</body>
</html>

<!DOCTYPE html>

<head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form method="post" action="#">
        <fieldset id="principal">
        <input type="text" name="cpfcnpj" placeholder="CPF/CNPJ" required><br>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="radio" name="sexo" id="masc" value="M" tabindex="1">
        <label for="masc">Masculino</label><br>
        <input type="radio" name="sexo" id="fem" value="F" tabindex="2">
        <label for="fem">Feminino</label><br>
        </fieldset>
        <fieldset id="endereco">
            <legend>Endereço</legend>
            <select name="estado"><br>
                <option hidden>Escolha um estado</option><br>
                <option value="RS">Rio Grande do Sul</option>
                <option value="SC">Santa catalina</option>
                <option value="PR">Parana</option>
            </select><br>
            <input type="text" name="cidade" placeholder="Cidade"><br>
            <input type="text" name="bairro" placeholder="Bairro"><br>
            <input type="text" name="rua" placeholder="Rua"><br>
            <input type="text" name="numero" placeholder="Numero"><br>
        </fieldset>
        <fieldset id="contato"> 
            <legend>Contatos</legend>
            <input type="email" name="email" placeholder="E-mail"><br>
            <input type="tel" name="fone" placeholder="Telefone"><br>
            <input type="tel" name="whats" placeholder="Whatsapp"><br>
        </fieldset><br>
        <input type="submit" value="Salvar Fornecedor" name="salvar" id="salvar">
    </form>
    <?php
    if(isset($_POST['salvar'])){
        $cpfcnpj=$_POST['cpfcnpj'];
        $sexo=$_POST['sexo'];
        $nome=$_POST['nome'];
        $estado=$_POST['estado'];
        $cidade=$_POST['cidade'];
        $bairro=$_POST['bairro'];
        $rua=$_POST['rua'];
        $numero=$_POST['numero']; 
        $email=$_POST['email'];
        $fone=$_POST['fone'];
        $whats=$_POST['whats'];
        include'connection.php';

        $sql="INSERT INTO fornecedor(cpf,nome,estado,cidade,bairro,rua,numero,sexo,email,fone,whatsApp)
            VALUE (:cpf,:nome,:estado,:cidade,:bairro,:rua,:numero,:sexo,:email,:fone,:whatsApp)";

        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':cpf',$cpfcnpj,PDO::PARAM_STR);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':estado',$estado,PDO::PARAM_STR);
        $stmt->bindParam(':cidade',$cidade,PDO::PARAM_STR);
        $stmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
        $stmt->bindParam(':rua',$rua,PDO::PARAM_STR);
        $stmt->bindParam(':sexo',$sexo,PDO::PARAM_STR);
        $stmt->bindParam(':numero',$numero,PDO::PARAM_STR);
        $stmt->bindParam(':email', $email,PDO::PARAM_STR);
        $stmt->bindParam(':fone',$fone,PDO::PARAM_STR);
        $stmt->bindParam(':whatsApp',$whats,PDO::PARAM_STR);
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
</$html>

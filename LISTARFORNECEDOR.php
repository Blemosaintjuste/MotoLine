<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="style.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<div class="conteiner">

            <h1>Lista de Fornecedores</h1>
            <table border="1">
                <tr>
                    <th>Nome</th><th>CPF</th><th>Estado</th><th>Cidade</th><th>Bairro</th><th>Rua</th>
                    <th>Número</th><th>Sexo</th><th>Fone</th><th>Email</th><th>Whats App</th>
                </tr>
                <?php
                    $sql="SELECT nome,cpf,estado,cidade,bairro,rua,
                    numero,sexo,fone,email,whatsApp FROM fornecedor";
                    $resultado=$conn->query($sql);
                    $tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tabela as $linha){
                        echo "<tr>";
                        foreach($linha as $coluna){
                           echo "<td>".$coluna."</td>";
                       }
                       echo "</tr>";
                    }
                ?>
            </table>
</div>      
    </body>
</html>
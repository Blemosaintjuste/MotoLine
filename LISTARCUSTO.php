<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Lista de Custos</title>
    <link rel="stylesheet" href="style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<div class="conteiner">
            <h1>Lista de Custos</h1>
            <table border="1">
                
                <tr>
                    <th>Descricao</th><th>valor</th><th>Origem_valor</th><th>Fk_placa </th>
                </tr>
                <?php
                    $sql="SELECT descricao,valor,origem_valor,fk_placa  FROM custo";
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
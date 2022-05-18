<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Lista de Vendas</title>
    <link rel="stylesheet" href="style.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<div class="conteiner">
            <h1>Lista de Vendas</h1>
            <table border="1">
                <tr>
                    <th>Valor</th><th>Data_venda</th><th>Fk_moto</th><th>Fk_cliente</th>
                </tr>
                <?php
                    $sql="SELECT valor,data_venda,fk_moto,fk_cliente FROM vender";
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
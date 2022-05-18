
Textos completos
placa	
modelo	
marca	
ano	
cor	
motor_cc
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<div class="conteiner">

            <h1>Lista de Produtos</h1>
            <table border="1">
                <tr>
                    <th>Placa</th><th>Modelo</th><th>Marca</th><th>Ano</th><th>Cor</th><th>Motor_cc</th>
                <?php
                    $sql="SELECT placa,modelo,marca,ano,cor,motor_cc FROM moto";
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro De Produto</title>
        <style>
            #dadosdoproduto{
                width:45%;
                height:180px;
                background-color:#f5e6ab;
            }
            #salvar{
                background-color: #1ed14b;
            }
        </style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="post" action="#">
            <fieldset id="dadosdoproduto">
                <legend>Dados Do Produto</legend>
                <input type="text" name="produto" placeholder="Tipo de Produto" required><br>
                <input type="text" name="modelo" placeholder="Modelo" required><br>
                <input type="text" name="marca" placeholder="Marca" required><br>
                Ano:<input type="text" name="Ano"><br>
                <input type="text" name="cores" placeholder="Escolha uma cor" required><br>
                <input type="text" name="motor" placeholder="Motor" required><br>
                <input type="text" name="placa" placeholder="Placa" required><br>
                <input type="text" name="segmento" placeholder="Escolha um Segmento" required><br>
            </fieldset>    
            <input type="submit" value="Salvar Produto" name="salvar" id="salvar">
        </form>
        <?php
        if (isset($_POST['salvar'])){
            $produto       =$_POST['produto'];
            $modelo     =$_POST['modelo'];
            $marca  =$_POST['marca'];
            $Ano   =$_POST['Ano'];
            $cores  =$_POST['cores'];
            $motor     =$_POST['motor'];
            $placa    =$_POST['placa'];
            $segmento       =$_POST['segmento'];
            include 'connection.php';

        $sql="INSERT INTO moto(placa,modelo,marca,ano,cor,motor_cc)
            VALUE(:placa,:modelo,:marca,:ano,:cor,:motor_cc)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':placa',$placa,PDO::PARAM_STR);
        $stmt->bindParam(':modelo',$modelo,PDO::PARAM_STR);
        $stmt->bindParam(':marca',$marca,PDO::PARAM_STR);
        $stmt->bindParam(':ano',$Ano,PDO::PARAM_INT);
        $stmt->bindParam(':cor',$cores,PDO::PARAM_STR);
        $stmt->bindParam(':motor_cc',$motor,PDO::PARAM_INT);
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
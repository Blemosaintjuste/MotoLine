<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CadastroDeCusto</title>
        <style>
        #dadosdocusto {
            width: 45%;
            height: 100px;
            background-color: #f5e6ab;
        }
        #salvar {
            background-color: #1ed14b;
        }
        </style>
    </head>
    <body>
        <form method="post" action="#">
            <fieldset id="dadosdocusto">
                <legend>Dados Do Custo</legend>
                <input type="text" name="descricoa" placeholder="Descrição" required><br>
                Rs:<input type="text" name="custo" placeholder="Custo" required><br>
                
                <select name="funcionario">
                    <option value="Rafael">Rafael</option>
                    <option value="Adelcio">Adelcio</option>
                </select><br>
                <input type="text" name="produto" placeholder="Escolha a Moto" required><br>
            </fieldset>
            <input type="submit" value="Salvar" name="salvar" id="salvar">
        </form>
        <?php
            if (isset($_POST['salvar'])){
                $descricoa       =$_POST['descricoa'];
                $custo    =$_POST['custo'];
                $funcionario  =$_POST['funcionario'];
                $produto   =$_POST['produto'];
                include 'connection.php';
                $sql="INSERT INTO custo(descricao,valor,origem_valor,fk_placa)
                    VALUE(:descricao,:valor,:origem_valor,:fk_placa)";
                $stmt=$conn->prepare($sql);
                $stmt->bindParam(':descricao',$descricoa ,PDO::PARAM_STR);
                $stmt->bindParam(':valor',$custo ,PDO::PARAM_INT);
                $stmt->bindParam(':origem_valor',$funcionario ,PDO::PARAM_STR);
                $stmt->bindParam(':fk_placa',$produto,PDO::PARAM_STR);
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
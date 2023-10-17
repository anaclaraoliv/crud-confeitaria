<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    $sql = "SELECT * FROM bolos";
    $resultado =  mysqli_query($conn, $sql);
    if(!empty($resultado)){
        while($row = mysqli_fetch_assoc($resultado)) {
            foreach($row as $chave => $valor){
                if($valor == $row['imagem']){
                    echo "<table>
                        <tr>
                            <td><?php echo $chave ?></td>
                            <td><img src='../imagens/".$valor."'></td>
                        </tr>";
                    
                } elseif($chave=='ID'){
                    $linha_id = $valor;
                    echo "<tr>
                            <td><strong>". $chave."</strong></td>
                            <td>".$valor."</td>
                        </tr>";
                }
                else {
                    echo "<tr>
                            <td><strong>".$chave."</strong></td>
                            <td>".$valor."</td>
                        </tr>";
                }
            }            

        // Adicionando botão de DELETAR 
        echo "<tr><th><form action='delete.php' method='post'>
                <button type='submit' name='id' value=".$linha_id.">Deletar</button>
                </form><th><br>";
        // Adicionando botão de EDITAR
        echo "<th><form action='editar.php' method='post'>
                <button type='submit' name='id' value=".$linha_id.">Editar</button>
                </form><th></tr></table>";
                    
        }  
    }
    mysqli_close($conn);
    ?>
</body>
</html>

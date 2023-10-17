<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
    // Exibindo produtos
    require "../conexao.php";
    require "../funcoes.php";
    $sql = "SELECT * FROM bolos";
    $resultado =  mysqli_query($conn, $sql);
    if(!empty($resultado)){
        while($row = mysqli_fetch_assoc($resultado)) {
            foreach($row as $chave => $valor){
                if($valor == $row['imagem']){
                    echo "<div class='catalogo'>
                        <tr>
                            <th><a href='formulario.php?id=".$row["ID"]."'> 
                            <img src='../imagens/".$valor."'></th></a><br>
                        </tr>";
                } elseif($chave=='ID'){
                    $linha_id = $valor;
                    echo "<tr>
                            <th><strong>". $chave."</strong></th>
                            <th>".$valor."</th><br>
                        </tr>";
                }
                else {
                    echo "<tr>
                            <th><strong>".$chave."</strong></th>
                            <th>".$valor."</th><br>
                        </tr></div>";
                }
            }        
        } 
    } 
    mysqli_close($conn);
    ?>
</body>
</html>
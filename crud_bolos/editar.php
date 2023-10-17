<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editando Produto</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php 
        if(isset($_POST['id'])){
            $id = $_POST['id'];

        require_once "../funcoes.php";

        $produto_info = select_by_id($id);
        
        echo "<h1>Edição de Produto - ".$produto_info[1]." [Id:".$produto_info[8]."]</h1>
        <p>Apenas os espaços preenchidos serão atualizados!</p>";
        }
    ?>
        <!--Definir exibição de valores já selecionados no cadastro durante a edição -> valor DEFAULT-->
        <form action='edit_valid.php' method='post' name='cadastro_produto' enctype='multipart/form-data'>
        <label for='pic' class='inserir' >
            Enviar nova imagem: <input type='file' name='pic' accept='image/*'><br><img src='../imagens/<?php echo $produto_info[0]?>'><br>
        </label>  

        <label for='produto' class='inserir'>
            Novo nome do produto: <input type='text' name='produto' placeholder='<?php echo $produto_info[1];?>'><br>
        </label>
        
        <label for='descricao' class='inserir'> 
            Nova descricão:<br><input type="textarea" style="width:250px;height:150px;" name="descricao" placeholder=
            '<?php 
                
                echo $produto_info[2];
            ?>'><br>
        </label>
        <label for='preco' class='inserir'>
            Novo preço: <input type='number' step=0.01 min=0 name='preco' placeholder='<?php echo $produto_info[3]." R$";?>'><br>
        </label>
        <label for='fatias' class='inserir' >
            Mudar nº Fatias: <input type="number" min=0 name='fatias' placeholder='<?php echo $produto_info[4];?>'><br>
        </label>
        <label for='tempo' class='inserir'>
            Tempo médio de preparo(Em dias): <input type='number' min=0 name='tempo' placeholder='<?php echo $produto_info[5]." Dia(s)";?>'><br>
        </label>

    <?php

    //Inserindo categorias com a opção marcada
        require_once '../funcoes.php';
        $resposta = take_tags();
        while ($row = mysqli_fetch_assoc($resposta)) {
            $categoria = $row['nome'];
            echo "  <label for='fatias' class='inserir' >
                        <input type='radio' name='categoria' value=".$categoria;
            if($categoria==$produto_info[7]){
                echo " checked='checked'><label for='categoria'>$categoria</label><br>";
            } else {
                echo "><label for='categoria'>$categoria</label><br>";
            }
        }        
        echo "<input type='hidden' name='id' value=".$id."></input>";
    ?><br>
        <input type="submit" value="Adicionar"> 
    </form>
        <a href="index.php"><button>Cancelar</button></a>    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Enviar mensagem</title>
</head>
<body>
    <?php
    require "../funcoes.php";
    error_reporting(E_ERROR | E_PARSE);
        if(isset($_GET['id'])){
            $id = $_GET['id'];}
        $prod_info = select_by_id($id);
         
        echo '<h1>Enviando Pedido: '.$prod_info[1].'</h1> 
        <img src="../imagens/'.$prod_info[0].'">';
    ?>

<form action="form_valid.php" method="post" name="envio_msg" enctype="multipart/form-data">
    <!-- Informações de contato obrigatórias-->
    <label for="nome" class="inserir">
        *Seu nome: <input type="text" name="nome"><br>
    </label>
    <label for="numero" class="inserir ">
        *Nº de contato: <input type="tel" name="numero"><br>
    </label>
    <label for="email" class="inserir">
        *Seu melhor email: <input type="email" name="email"><br>
    </label>
    <label for="entrega"class="inserir" >
        *Data de entrega: <input type="date" name="entrega"><br>
    </label>

    <!-- Perguntas sobre customização do bolo opcionais-->
    <label for="gostou" class="inserir">
        Do que você gostou e deseja manter no bolo? 
        <input type="text" name="gostou">
    </label>
    <label for="mudar" class="inserir">
        O que deseja mudar no bolo? 
        <input type="text" name="mudar">
    </label>
    <label for="tema" class="inserir">
        O bolo deverá ter tema? Qual? 
        <input type="text" name="tema">
    </label>
    <label for="topo" class="inserir">
        O que deve haver no topo do bolo? 
        <input type="text" name="topo">
    </label>
    <label for="obs_geral" class="inserir">
        Outras observações: 
        <input type="text" name="obs_geral">
    </label>
    
    <!-- Enviar imagem referencia-->
    <label for="pic" class="inserir">
        Imagem referência: <input type="file" name="pic" accept="image/*">
    </label> 

    <input type="hidden" name='id' value='<?php echo $id;?>'>

    <input type="submit" value="Enviar"> 
</form>
    <a href="index.php"><button>Cancelar</button></a>
</body>
</html>
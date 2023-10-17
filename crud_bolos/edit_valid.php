<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editando Produto</title>
</head>
<body>    
<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        require_once "../funcoes.php";
        $valores = select_by_id($id);
        
        if(empty($_POST['produto'])){
            $produto = $valores[1] ;
        } else{
            $produto = $_POST['produto'];
        }

        if(empty($_POST['descricao'])){
            $descricao = $valores[2];
        } else{
            $descricao = $_POST['descricao'];
        }

        if(empty($_POST['preco'])){
            $preco = $valores[3];
        } else{
            $preco = $_POST['preco'];
        }

        if(empty($_POST['fatias'])){
            $fatias = $valores[4];
        } else{
            $fatias = $_POST['fatias'];
        }

        if(empty($_POST['tempo'])){
            $tempo = $valores[5];
        } else{
            $tempo = $_POST['tempo'];
        }

        if(empty($_POST['categoria'])){
            $categoria = $valores[7];
        } else{
            $categoria = $_POST['categoria'];
        }
        
        if ($_FILES['pic']["size"] <= 20000000 && $_FILES['pic']!=0) { // Verificando o tamanho do arquivo
                $ext = strtolower(pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION));
                if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "webp"){
                    $new_name = date("Y-m-d_H-i-s").".".$ext; //Definindo um novo nome para o arquivo
                    $dir = '../imagens/'; //Diretório para uploads
                    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo                   
                    $img = $new_name;
                    // Excluindo imagem anterior na pasta
                    $arquivo = '../imagens/'.$valores[0];
                    if(file_exists($arquivo)){
                        unlink($arquivo);
                      }
                    update_com_img($img, $produto, $descricao, $preco, $fatias, $tempo, $categoria,$id);  
                }
            }  else {
                $img = $valores[0];
            }  
                
        update_sem_img($produto, $descricao, $preco, $fatias, $tempo, $categoria,$id);
        header("Location:index.php?");
    }
?>
</body>
</html>
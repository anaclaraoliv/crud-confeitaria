<?php 
    if(isset( $_POST['id'])){
        require_once '../funcoes.php';
        require '../conexao.php';
        $id = $_POST['id'];
        $produto_info = select_by_id($id);
        if(!empty($produto_info)){
            $sql = "DELETE FROM bolos where ID='{$id}'";
            $row = mysqli_query($conn, $sql);
            // Excluindo imagem anterior na pasta
            $arquivo = '../imagens/'.$produto_info[0];
            if(file_exists($arquivo)){
                unlink($arquivo);
                echo $arquivo;
            }
        }
            header('Location:index.php');
    }
   
?>
<?php
    $tipo_resposta = $_POST['tipo_resposta'];
    $status_msg = $_POST['status_msg'];
    $venda = $_POST['venda'];
    $id = $_POST['submit'];
    $img = $_POST['img'];

    require "../conexao.php";
    $sql = $conn->prepare("UPDATE mensagem SET tipo_resposta=? ,status_msg=?,venda=? WHERE ID='{$id}'");
    $sql->bind_param("sss",$tipo_resposta, $status_msg, $venda);
    $sql->execute();
    $sql->close();

    if($status_msg == 'Atendida' || $status_msg == 'Fechada'){
        // Definindo data de finalização do pedido
        $data_finalizacao = date('m-d-y');
        $sql = $conn->prepare("UPDATE mensagem SET data_finalizacao=? WHERE ID='{$id}'");
        $sql->bind_param("s",$data_finalizacao);
        $sql->execute();
        $sql->close();

        // Excluindo imagem de referência 
        $arquivo = '../imagens/img_msg/'.$img;
        if(file_exists($arquivo)){
            unlink($arquivo);
            echo $arquivo;
        }
    }
    header('Location:index.php');
?>
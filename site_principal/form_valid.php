<?php
    require_once "../funcoes.php";
    // eStabeLecer bolo a partir de ID
    $id_bolo = $_POST['id'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $data = date("m-d-y");
    $gostou = $_POST['gostou'];
    $mudar = $_POST['mudar'];
    $tema = $_POST['tema'];
    $topo = $_POST['topo'];
    $geral = $_POST['obs_geral'];
    $entrega = $_POST['entrega'];

    // Se os dados obrigatórios foram inseridos
    if(!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['numero']) && !empty($_POST['email']) && !empty($_POST['entrega'])){
        
        // Verificando se a imagem referencia foi enviada
        if($_FILES['pic']["size"] <= 20000000 && $_FILES['pic']["size"] != 0){
            $ext = strtolower(pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION));
            if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "webp"){
                $new_name = date("Y-m-d_H-i-s").".".$ext; 
                $dir = '../imagens/img_msg/'; 
                move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name);                  
                $img_ref = $new_name;

                // ENVIAR DADOS COM IMAGEM REFERENCIA PRESENTE E VALIDADA
                enviar_msg($id_bolo,$nome,$data,$numero,$email,$entrega,$gostou,$mudar,$tema,$img_ref,$topo,$geral);
                header("Location:index.php?");

            } else{echo 'Tamanho ou formato inválido(jpeg,png ou webp).'; }
        } else {
            $img_ref = " ";
            // ENVIAR DADOS SEM IMAGEM REFERENCIA 
            enviar_msg($id_bolo,$nome,$data,$numero,$email,$entrega,$gostou,$mudar,$tema,$img_ref,$topo,$geral);
            header("Location:index.php?");
        }
    } else {echo 'Preencha todos os campos obrigatórios \'*\' para um melhor atendimento.';}     
?>
</body>
</html>
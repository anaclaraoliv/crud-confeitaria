<?php 

// Buscar linhas no BD das categorias
function take_tags(){
    require "conexao.php";  
    $sql = "SELECT * FROM categoria";
    $result =  mysqli_query($conn, $sql); 

    if(!empty($result)){
        return $result;
    } else {
        return "Sem categorias localizadas";
    }
}

function cadastro($img, $produto, $descricao, $preco, $fatias, $tempo, $categoria, $inclusao){
    require "conexao.php";
    $sql = $conn->prepare("INSERT INTO bolos(`imagem`,`produto`,`descricao`,
                    `valor`,`fatias`,`tempo_dias`,`categoria`,`inclusao`) 
                    VALUES (?,?,?,?,?,?,?,?)");
    $sql->bind_param("sssdiiss", $img, $produto, $descricao, $preco, $fatias,
                            $tempo, $categoria, $inclusao);
    $sql->execute();

    $sql->close();      
}

function update_com_img($img, $produto, $descricao, $preco, $fatias, $tempo, $categoria,$id){
    require "conexao.php";
    $sql = $conn->prepare("UPDATE bolos SET imagem=? ,produto=? ,descricao=? , 
                        valor=? , fatias=? ,tempo_dias=? ,categoria=? WHERE ID='{$id}'");
    $sql->bind_param("sssdiis",$img, $produto, $descricao, $preco, $fatias, $tempo, $categoria);
    $sql->execute();
    $sql->close();   
}

function update_sem_img($produto, $descricao, $preco, $fatias, $tempo, $categoria,$id){
    require "conexao.php";
    $sql = $conn->prepare("UPDATE bolos SET produto=? ,descricao=? , 
                        valor=? , fatias=? ,tempo_dias=? ,categoria=? WHERE ID='{$id}'");
    $sql->bind_param("ssdiis", $produto, $descricao, $preco, $fatias, $tempo, $categoria);
    $sql->execute();
    $sql->close();   
}

# Selecionando produtos
function select_by_id($id){
    require "conexao.php";
    $valores=array();
    $sql = "SELECT * FROM bolos WHERE ID=".$id;
    $resultado =  mysqli_query($conn, $sql);
    if(!empty($resultado)){
        while($row = mysqli_fetch_assoc($resultado)) {
            foreach($row as $chave => $value){
                array_push($valores,$value);
                }
            }
        }
    return $valores;
}
function enviar_msg($id_produto,$nome,$data,$numero,$email,$entrega,$gostou,$mudar,$tema,$ref,$topo,$geral){
    $tipo_resposta = 'Em andamento';
    $status_msg = 'Nova' ;
    $data_finalizacao = 'Em andamento';
    $venda = 'Não';
    require "conexao.php";
    $sql = $conn->prepare("INSERT INTO mensagem(`id_produto`,`nome`,`data`,`telefone`,
                        `email`,`gostou`,`mudar`,`tema`,`ref`,`topo`,`geral`,`entrega`
                        ,`tipo_resposta`,`status_msg`,`data_finalizacao`,`venda`) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->bind_param("ississssssssssss",$id_produto,$nome,$data,$numero,$email,$gostou,
                    $mudar,$tema,$ref,$topo,$geral,$entrega,$tipo_resposta,$status_msg,
                    $data_finalizacao,$venda);
    $sql->execute();

    $sql->close(); 
}
?>
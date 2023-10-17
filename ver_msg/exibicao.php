<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
    <?php
    // Exibindo mensagens
    require "../conexao.php";
    require "../funcoes.php";
    $sql = "SELECT * FROM mensagem";
    $resultado =  mysqli_query($conn, $sql);
    if(!empty($resultado)){
        while($row = mysqli_fetch_assoc($resultado)) {
            echo "<form action='msg_edit.php' method='post' name='envio_msg'>";
            foreach($row as $chave => $valor){
                switch($chave){
                    case 'id':
                        echo "<br><tr><th><strong>ID-MSG: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break; 
                    case 'id_produto':
                        $bolo = select_by_id($valor);
                        echo "<tr><th><strong>Bolo selecionado: </strong></th>
                                <th>(".$valor.")";
                        if(isset($bolo[1])){
                            echo $bolo[1]."</th></tr><br>";
                        }else {
                            echo "Esse produto foi removido do catálogo</th></tr><br>";
                        } 
                        break;
                    case 'nome':
                        echo "<tr><th><strong>Remetente: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;       
                    case 'telefone':
                        echo "<tr><th><strong>Nº de Contato: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;  
                    case 'email':
                        echo "<tr><th><strong>Email: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;  
                    case 'entrega':
                        echo "<tr><th><strong>Data da encomenda: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break; 
                    case 'ref':
                        echo "<tr><th><strong>Referência: </strong></th>";
                        $arquivo = '../imagens/img_msg/'.$valor;
                        if(file_exists($arquivo)){
                            echo "<th><img src='../imagens/img_msg/".$valor."'></th></tr><br>";    
                        }else {echo "</tr><br>";}   
                        echo "<input type='hidden' name='img' value='".$valor."'>";                  
                        break; 
                    case 'gostou':
                        echo "<tr><th><strong>O que gostou no bolo: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;   
                    case 'mudar':
                        echo "<tr><th><strong>O deseja mudar no bolo: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;
                    case 'tema':
                        echo "<tr><th><strong>Tema customizado: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;
                    case 'topo':
                        echo "<tr><th><strong>Customização de adereços do topo: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;
                    case 'geral':
                        echo "<tr><th><strong>Observação: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;
                    case 'tipo_resposta':
                        echo "
                        <tr><th><strong>Tipo de resposta: </strong></th>
                        <th><label for='tipo_resposta' class='inserir'> 
                            <select name='tipo_resposta'>
                                <option value='".$valor."'>".$valor."</option>
                                <option value='Em andamento'>Em andamento</option>
                                <option value='Por WhatsApp'>Respondido por WhatsApp</option>
                                <option value='Por E-mail'>Respondido por E-mail</option>
                                <option value='E-mail e WhatsApp'>E-mail e WhatApp</option>
                                <option value='Telefone e WhatsApp'>E-mail e WhatApp</option>
                                <option value='E-mail e Telefone'>E-mail e WhatApp</option>
                                <option value='Por Telefone'>Por Telefone</option>
                                <option value='Sem retorno'>Sem retorno</option>
                            </select>
                        </label></th></tr><br>";                         
                        break;
                    case 'status_msg':
                        echo "
                        <tr><th><strong>Status da mensagem: </strong></th>
                        <th><label for='status_msg' class='inserir'> 
                            <select name='status_msg'>
                                <option value='".$valor."'>".$valor."</option>
                                <option value='Nova'>Nova</option>
                                <option value='Em andamento'>Em andamento</option>
                                <option value='Atendida'>Atendida</option>
                                <option value='Fechada'>Fechada</option>
                            </select>
                        </label></th></tr><br>";                          
                        break;

                    case 'data_finalizacao':
                        echo "<tr><th><strong>Data de finalização: </strong></th>
                                <th>".$valor."</th>
                            </tr><br>";                         
                        break;  
                    case 'venda':
                        echo "
                        <tr><th><strong>Houve venda? </strong></th>
                        <th><label for='venda' class='inserir'> 
                            <select name='venda'>
                                <option value='".$valor."'>".$valor."</option>
                                <option value='Sim'>Sim</option>
                                <option value='Não'>Não</option>
                            </select>
                        </label></th></tr><br>";                          
                        break;            
                }
            }  
            echo "<tr><th><button type='submit' name='submit' 
                value=".$row['id'].">Atualizar</button>
                </th></tr></form><br>";
        } 
    }
    mysqli_close($conn);
    ?>
</body>
</html>
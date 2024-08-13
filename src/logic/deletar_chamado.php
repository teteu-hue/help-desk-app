<?php

require_once(dirname(__DIR__) . "/database/Dao.class.php");

function deletar_chamado($id_chamado)
{
    $sql_query = "DELETE FROM chamado
                  WHERE id_chamado = $id_chamado";

    $dao = new Dao();
    $result = $dao->run_non_query($sql_query);
    
    echo $result;
}

if(isset($_GET))
{
    if(!empty($_GET['id_chamado']))
    {
        deletar_chamado($_GET['id_chamado']);
        header("Location: ../views/consultar_chamado.php?deleted=1");
    } 
    else 
    {
    
    }
}

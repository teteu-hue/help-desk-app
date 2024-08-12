<?php

require_once(dirname(__DIR__) . "/database/Dao.class.php");
require_once(dirname(__FILE__) . "/isAdminOrUser.php");


function consultar_chamados($id_user, $role)
{

    if($role == 'admin')
    {
        $sql_query = "SELECT titulo, categoria, descricao, usuario.name_user 
                  FROM chamado 
                  INNER JOIN usuario
                  ON usuario.id_user = chamado.id_user";
    } 
    else 
    {
        $sql_query = "SELECT titulo, categoria, descricao, usuario.name_user 
        FROM chamado 
        INNER JOIN usuario 
        ON usuario.id_user = chamado.id_user 
        WHERE usuario.id_user = $id_user";

    }

    $dao = new Dao();
    $data = $dao->runQuery($sql_query)->fetchAll();
    if(empty($data))
    {
        return [];
    } else {
        return $data;
    }
}

?>

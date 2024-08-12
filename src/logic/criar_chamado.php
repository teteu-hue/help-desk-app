<?php
require_once(dirname(__DIR__) . "/config/config.php");
require_once(dirname(__DIR__) . "/database/Dao.class.php");

if(session_status() === PHP_SESSION_ACTIVE && $_SERVER['REQUEST_METHOD'] !== 'POST')
{
    header("Location: $views_dir/home.php?error=unauthorized");
}

function create_chamado($titulo, $categoria, $descricao, $id_user)
{
    $sql_query = "INSERT INTO chamado(titulo, categoria, descricao, id_user)
                  VALUES (:titulo, :categoria, :descricao, :id_user)";
    
    $data = [
        ":titulo" => $titulo,
        ":categoria" => $categoria,
        ":descricao" => $descricao,
        ":id_user" => $id_user
    ];

    $dao = new Dao();

    $result = $dao->runQuery($sql_query, $data);

    return $result;
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(empty($_POST['categoria']))
    {
        echo "Categoria não informada!";
        header("Location: $views_dir/abrir_chamado.php?error=category_empty");
    } else 
    {
        session_start();

        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $id_user = $_SESSION['id_user'];
    
        create_chamado($titulo, $categoria, $descricao, $id_user);
        
        header("Location: $views_dir/consultar_chamado.php");
    
    }
} else {
    die("Acesso negado!");
}

?>

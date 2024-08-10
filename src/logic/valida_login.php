<?php 

require_once(dirname(__DIR__) . "/database/Dao.class.php");
$home_dir = "../views/home.php";

$usuario_autenticado = false;

function search_user_in_database($email, $senha)
{
    $sql_query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

    $dao = new Dao();

    $response = $dao->runQuery($sql_query)->fetch();

    return $response;
}

function validarDados($email, $senha)
{
    global $usuario_autenticado;

    $result = search_user_in_database($email, $senha);

    if($result != FALSE)
    {
      $usuario_autenticado = true;
      return $result;  
    } else {
        return $result;
    }
}

$email = $_POST['email'];
$senha = $_POST['password'];

$result = validarDados($email, $senha);

if($usuario_autenticado == TRUE)
{
    session_start();
    $_SESSION['email'] = $result['email'];
    $_SESSION['name_user'] = $result['name_user'];
    header("Location: $home_dir");
} else {
    header('Location: index.php?error=not_found_user');
}

echo "<pre>";
?>

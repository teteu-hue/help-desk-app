<?php 

require_once('Dao.class.php');

$usuario_autenticado = false;

function validarDados($email, $senha)
{
    global $usuario_autenticado;

    $dao = new Dao();

    $sql_query = "SELECT * FROM usuario WHERE email = '$email' AND password = '$senha'";
    try {
        $response = $dao->runQuery($sql_query);
    } catch(PDOException $e) {

        echo "Login inválido!";

    }
    $result = $response->fetch();

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
    echo "USUÁRIO AUTENTICADO";
} else {
    header('Location: index.php?error=not_found_user');
}

echo "<pre>";
?>

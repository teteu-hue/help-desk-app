
<?php
require_once("./user_auth.php");

session_destroy();

if(session_status() !== PHP_SESSION_ACTIVE)
{
    header("Location: ../../index.php?logout=1");
}

?>

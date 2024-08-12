
<?php
require_once("./user_auth.php");

session_start();

function destroySessions($specifics = [])
{
    if(!empty($specifics))
    {
        foreach($_SESSION as $session => $session_value)
        {
            if(in_array($session, $specifics))
            {
                unset($_SESSION[$session]);
            }
        } 
    } else {
        $_SESSION = [];
    }
    header("Location: /help-desk-app?logout=1");
}

destroySessions(['email', 'name_user', 'id_user']);

?>

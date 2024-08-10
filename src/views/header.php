<?php 

require_once(dirname(__DIR__) . "/config/config.php");

$logout_path =  "/help-desk-app/src/logic/logout.php";
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <?php
        
            echo "
                <img src='$logo_path_img?' 
                    width='30' 
                    height='30' 
                    class='d-inline-block align-top' 
                    alt=''>
            "
        
        ?>
        App Help Desk
      </a>
      <?php 

      if(session_status() == PHP_SESSION_ACTIVE)
      {
        if(isset($_SESSION['email']) && isset($_SESSION['name_user']))
        {
        $email = $_SESSION['email'];
        $name_user = $_SESSION['name_user'];
    
        echo "
          <div>
            <ul class='list-unstyled row align-items-center'>
              <li class='text-light mr-3'>$email</li>
              <li class='text-light mr-3'>$name_user</li>
              <li class='text-light mr-3 mt-3'>
            
              <form action='$logout_path' method='post'>
                <input class='btn btn-danger btn-sm text-white' type='submit' value='Sair' />
              </form>
              </li>
            </ul>
          </div>
        ";
       } else 
       {
          header("Location: ../../index.php?error=dont_have_permission");
       }
       
      }

      ?>

      
    </nav>
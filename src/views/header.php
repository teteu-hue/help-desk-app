<?php 

require_once(dirname(__DIR__) . "/config/config.php");

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
      <div>
        <ul class="list-unstyled">
          <li class="text-white">Email</li>
          <li class="text-white">Nome Cliente</li>
        </ul>
      </div>
    </nav>
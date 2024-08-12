<?php 

require_once(dirname(__FILE__) . "/src/views/header.php");
require_once(dirname(__FILE__) . "/src/config/config.php");

?>

    <div class="container">    
      <div class="row flex-column">
        <?php

          if(isset($_GET['logout']))
          {
            $logout = $_GET['logout'];
            switch($logout)
            {
              case 1:
                echo "
                    <h1 class='text-center m-3'>
                        Entre novamente!
                    </h1>
                ";
                break;
            }
          } else 
          {
            echo "
                  <h1 class='text-center m-3'>
                    Seja bem vindo ao APP HELP DESK!
                  </h1>
              ";
          }
        ?>

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="<?php echo  $login_path; ?>" method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
              <?php

                if(isset($_GET['error']))
                {
                  $error = $_GET['error'];
                  switch($error){
                    case 'not_found_user':
                      echo "<div class='text-danger text-center'>Usuário não encontrado!</div>";
                      break;
                    case 'dont_have_permission':
                      echo "<div class='text-danger text-center'>Acesso negado!</div>";
                      break;
                  }
                }
              ?>

            </div>
          </div>
        </div>
    </div>
<?php 

require_once(dirname(__FILE__) . "/src/views/footer.php");

?>
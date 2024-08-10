<?php 

require_once(dirname(__FILE__) . "/src/views/header.php");

$validate_login =  "/help-desk-app/src/logic/valida_login.php";
?>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="<?php echo  $validate_login; ?>" method="post">
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
                      echo "<div class='bg-danger'>Usuário não encontrado!</div>";
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
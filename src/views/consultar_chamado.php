<?php 
session_start();
require_once(dirname(__FILE__) . "/header.php");
require_once(dirname(__DIR__) . "/logic/consultar_chamados.php");
require_once(dirname(__DIR__) . "/logic/isAdminOrUser.php");
$data = consultar_chamados($_SESSION['id_user'], $_SESSION['role']);
?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php 
                if(!empty($data)){

                  foreach($data as $row)
                  {
                  $titulo = $row['titulo'];
                  $categoria = $row['categoria'];
                  $descricao = $row['descricao'];
                  $name_user = $row['name_user'];
                  echo "
                  <div class='card mb-3 bg-light'>
                    <div class='card-body'>
                      <h5 class='display-4'>$name_user</h5>
                      <h5 class='card-title text-center'>$titulo</h5>
                      <h6 class='card-subtitle mb-2 text-muted'>$categoria</h6>
                      <p class='card-text'>$descricao</p>
                      </div>
                      </div>
                      ";
                  }
                } else 
                {
                  echo "
                  <div class='card mb-3 bg-light'>
                    <div class='card-body'>
                      <h1 class='lead'>Usuário sem chamados em aberto</h1>
                    </div>
                  </div>";
                }
                    
              ?>
              
              

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
require_once(dirname(__FILE__) . "/footer.php");
?>

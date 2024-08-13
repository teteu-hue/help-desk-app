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
              <h1 class="text-center display-3">Consulta de chamado</h1>
            </div>
            
            <?php if(isset($_GET['deleted'])){   
                  echo "<h4 class='text-success display-4 text-center'>Deletado com sucesso!</h4>";
            } ?>  

            <div class="card-body w-100">

              <?php 
                if(!empty($data)){

                  foreach($data as $row)
                  {
                  $id = $row['id_chamado'];
                  $titulo = $row['titulo'];
                  $categoria = $row['categoria'];
                  $descricao = $row['descricao'];
                  $name_user = $row['name_user'];
                  echo "
                  <div class='card mb-3 bg-light'>
                    <form action='../logic/deletar_chamado.php?id_chamado=$id' method='post'>
                      <button class='m-3 btn btn-danger text-white' type='text'>
                        Apagar
                      </button>  
                    </form>
                    <div class='card-body w-100'>
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

<?php
session_start();
require_once(dirname(__FILE__) . "/header.php");
?>


<div class="container">
  <div class="row">

    <div class="card-abrir-chamado">
      <div class="card">
        <div class="card-header">
          Abertura de chamado
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">

              <form action="../logic/criar_chamado.php" method="post">
                <div class="form-group">
                  <label>Título</label>
                  <input name="titulo" required type="text" class="form-control" placeholder="Título">
                </div>

                <div class="form-group">
                  <label>Categoria</label>
                  <select name="categoria" required class="form-control">
                    <option selected disabled>--Selecione--</option>
                    <option value="Criação Usuário">Criação Usuário</option>
                    <option value="Impressora">Impressora</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Software">Software</option>
                    <option value="Rede">Rede</option>
                  </select>
                </div>
                <?php
                if (isset($_GET['error'])) {
                  $error = $_GET['error'];

                  switch ($error) {
                    case 'category_empty':
                      echo "<p class='lead text-danger text-center'>Categoria não foi preenchida!</p>";
                      break;
                  }
                }
                ?>
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea name="descricao" required class="form-control" rows="3"></textarea>
                </div>

                <div class="row mt-5">
                  <div class="col-6">
                    <a class="btn btn-lg btn-warning btn-block text-white" href="home.php">Voltar</a>
                  </div>

                  <div class="col-6">
                    <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once(dirname(__FILE__) . "/footer.php");
  ?>
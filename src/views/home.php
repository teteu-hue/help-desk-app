<?php
session_start();

require_once(dirname(__FILE__) . "/header.php");
?>


<div class="container">
  <div class="row">

    <div class="card-home">
      <div class="card">
        <div class="card-header">
          Menu
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 d-flex justify-content-center">
              <a href="./abrir_chamado.php">
                <?php

                echo "
                      <img src='$open_form_path_img' 
                           width='70' 
                           height='70'>"
                ?>
              </a>
            </div>
            <div class="col-6 d-flex justify-content-center">
              <a href="./consultar_chamado.php">
                <?php
                echo "
                      <img src='$search_form_path_img'
                        width='70'
                        height='70'>"
                ?>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once(dirname(__FILE__) . "/footer.php");
  ?>
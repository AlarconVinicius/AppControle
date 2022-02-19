<?php

    include "../sistema_login/valida_acesso.php";
    $acao = "recuperarP";
    require "controller_prod.php";
    /* echo "<pre>";
    print_r($produtos);
    echo "</pre>"; */

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- BOOSTRAP -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- FONTAWESOME -->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
              <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Adm Clínica
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a href="../sistema_login/logout.php" class="nav-link ">SAIR</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if(isset($_GET['salvo']) && ($_GET['salvo']) == 2) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Produto Atualizado com Sucesso!</h5>
        </div>
    <?php } ?>

    <?php if(isset($_GET['salvo']) && ($_GET['salvo']) == 3) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Produto Excluído!</h5>
        </div>
    <?php } ?>

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
              <ul class="list-group">
                <li class="list-group-item"><a href="home.php">Tarefas pendentes</a></li>
                <li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
                <li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
                <li class="list-group-item"><a href="add_prod.php">Adicionar Produto</a></li>
                <li class="list-group-item active"><a href="consultar_prod.php">Consultar Estoque</a></li>
              </ul>
            </div>

            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Consultar Estoque</h4>
                            <hr />
                            <form class="d-flex">
                                <input class="form-control me-2 mb-3" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success mb-3" type="submit">Search</button>
                              </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered border border-primary">
                                  <thead class="thead-light text-center">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Produto</th>
                                      <th scope="col">Descrição</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Data Cadastro</th>
                                      <th scope="col">Estoque</th>
                                      <th scope="col">...</th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-center">
                                    <?php foreach($produtos as $indice=>$produto) { 
                                      
                                      /* echo '<pre>';
                                      print_r($produtos);
                                      echo '<pre>'; */
                                      ?>
                                      
                                      <tr>
                                        <td><?= $produto->id_prod ?></td>
                                        <td  class="text-truncate" style="max-width: 150px;"><?= $produto->nome_prod ?></td>
                                        <td class="text-truncate" style="max-width: 170px;"><?= $produto->descricao_prod ?></td>
                                        <td><?= $produto->status ?></td>
                                        <td><?= $produto->data_cadastro_prod ?></td>
                                        <td><?= $produto->estoque_prod ?></td>
                                        <td>
                                          
                                          <!-- <i class="fas fa-trash-alt fa-lg text-danger"></i> -->

                                          <a href="../regras_negoc/visual"><i class="fas fa-search fa-lg"></i></a>

                                          <a href="../regras_negoc/edit_prod.php?id=<?= $produto->id_prod ?>"><i class="fas fa-edit fa-lg text-warning"></i></a>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
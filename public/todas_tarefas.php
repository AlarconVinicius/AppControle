<?php

    include "../sistema_login/valida_acesso.php";
    $acao = 'recuperarT';
    require 'controller.php';

    /* echo '<pre>';
	print_r($tarefas);
	echo '</pre>'; */

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
            <h5>Tarefa Atualizada com Sucesso!</h5>
        </div>
    <?php } ?>

    <?php if(isset($_GET['salvo']) && ($_GET['salvo']) == 3) { ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Tarefa Excluída!</h5>
        </div>
    <?php } ?>

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <li class="list-group-item"><a href="home.php">Tarefas pendentes</a></li>
                    <li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
                    <li class="list-group-item active"><a href="todas_tarefas.php">Todas tarefas</a></li>
                    <li class="list-group-item"><a href="add_prod.php">Adicionar Produto</a></li>
                    <li class="list-group-item"><a href="consultar_prod.php">Consultar Estoque</a></li>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Todas tarefas</h4>
                            <hr />
    
                            <?php foreach($tarefas as $indice => $tarefa) { ?>
                                <!-- <?php 
                                    echo '<pre>';
                                    print_r($tarefa);
                                ?> -->
                                <div class="row mb-3 d-flex align-items-center tarefa">
                                    <div class="col-sm-9"> <?=$tarefa->tarefa?> (<?=$tarefa->status?>)</div>
                                    <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                        <a href="todas_tarefas.php?acao=deletarT&id=<?=$tarefa->id_tarefa?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>

                                        <?php if($tarefa->status == 'pendente') { ?>
                                            <a href="../regras_negoc/edit.php?id=<?=$tarefa->id_tarefa?>"><i class="fas fa-edit fa-lg text-info"></i></a>

                                            <a href="todas_tarefas.php?acao=realizarT&id=<?=$tarefa->id_tarefa?>"><i class="fas fa-check-square fa-lg text-success"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                                <!-- MODAL -->

                                <!-- FUTURAMENTE IMPLEMENTAR ESSE MODAL -->

                                <!-- <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Atualizar Tarefa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="controller.php?acao=atualizarT">
                                                    <div class="form-group">
                                                        <label>Tarefa:</label>
                                                        <input type="text" class="form-control" name="tarefa"  value="<?= $tarefa->tarefa?>" required>
                                                        <input type="hidden" name="id_tarefa" value="<?=$tarefa->id_tarefa?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Salvar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
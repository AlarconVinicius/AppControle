<?php

    include "../sistema_login/valida_acesso.php";
    $acao = 'recuperarT';
    require '../public/controller.php';

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
            <h5>Tarefa atualizada com sucesso!</h5>
        </div>
    <?php } ?>
    
    <div class="container app">

            <div class="col-md-12">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Atualizar tarefa</h4>
                            <hr />
                            <?php foreach($tarefas as $indice => $tarefa) {?>

                                <?php if(isset($_GET['id']) && $_GET['id'] == $tarefa->id_tarefa) { ?>
                                    <form method="post" action="../public/controller.php?acao=atualizarT">
                                        <div class="form-group">
                                            <label>Descrição da tarefa:</label>
                                            <input type="text" class="form-control" name="tarefa"  placeholder="Exemplo: Lavar o carro" required value="<?=$tarefa->tarefa?>">
                                            <input type="hidden" name="id_tarefa" value="<?=$tarefa->id_tarefa?>">
                                        </div>

                                        <a href="todas_tarefas.php" class="btn btn-info">Voltar</a>
                                        <button class="btn btn-success">Salvar</button>
                                    </form>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
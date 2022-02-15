<?php

    include "../sistema_login/valida_acesso.php";

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

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <li class="list-group-item"><a href="home.php">Tarefas pendentes</a></li>
                    <li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
                    <li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
                    <li class="list-group-item active"><a href="add_prod.php">Adicionar Produto</a></li>
                    <li class="list-group-item"><a href="consultar_prod.php">Consultar Estoque</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Adicionar Produto</h4>
                            <hr />

                            <form method="post" action="controller.php">
                                <div class="form-group">
                                  <label>Nome</label>
                                  <input name="nome_prod" type="text" class="form-control" placeholder="Produto" required>
                                </div>
            
                                <!-- <div class="form-group">
                                  <label>Data/Hora</label>
                                  <input name="data_hora" type="datetime-local" class="form-control" min='2022-01-01 00:00:00' max='2022-12-31 00:00:00'>
                                </div> -->
                                
                                <div class="form-group">
                                  <label>Descrição</label>
                                  <textarea name="descricao_prod" class="form-control" rows="3" required></textarea>
                                </div>
            
                                <button class="btn btn-success">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
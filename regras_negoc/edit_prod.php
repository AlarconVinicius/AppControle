<?php

    include "../sistema_login/valida_acesso.php";
    $acao = "recuperarP";
    require "../public/controller_prod.php";
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

    <div class="container app">
        <div class="row">

            <div class="col-md-12">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Atualizar Produto</h4>
                            <hr />

                            <?php foreach($produtos as $indice=>$produto) { 
                               /*  echo "<pre>";
                                print_r($produto);
                                echo "</pre>"; */?>
                                <?php
                                 if(isset($_GET['id']) && $_GET['id'] == $produto->id_prod) { ?>
                                
                                <form method="post" action="controller_prod.php?acao=atualizarP">
                                    <input type="hidden" name="id_prod" value="<?=$produto->id_prod?>">
                                    <div class="form-row">
                                            
                                        <div class="form-group col-md-10">
                                            <label>Nome</label>
                                            <input name="nome_prod" type="text" class="form-control" value="<?=$produto->nome_prod?>" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Estoque</label>
                                            <input name="estoque_prod" type="number" min="0" max="500" class="form-control" value="<?=$produto->estoque_prod?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label>Descrição</label>
                                            <textarea name="descricao_prod" class="form-control" rows="3" value="<?=$produto->descricao_prod?>"></textarea>
                                        </div>
                                        <div class="mt-4 col-md-2">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="test" id="ativo" value="" checked>
                                                    <label class="form-check-label" for="ativo">Ativo</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="test" id="nao-ativo" value="">
                                                    <label class="form-check-label" for="nao-ativo">Não Ativo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="../public/consultar_prod.php" class="btn btn-info">Voltar</a>
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
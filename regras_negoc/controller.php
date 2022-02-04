<?php 
    
    require '../regras_negoc/tarefa.model.php';
    require '../regras_negoc/tarefa_service.php';
    require '../regras_negoc/conexao.php';

    /* echo '<pre>';
    print_r($_POST);
    echo '</pre>'; */

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserirT') {
        
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserirT();

        header('Location: nova_tarefa.php?salvo=1');

    } else if($acao == 'recuperarT') {

        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarT();

    } else if($acao == 'atualizarT') {

        $tarefa = new Tarefa();
        $tarefa->__set('id_tarefa', $_POST['id_tarefa']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizarT();

        if($tarefaService->atualizarT()) {
            header('Location: todas_tarefas.php');
        } 
        echo 'CHEGUEI AQUI';

    } else if( $acao == 'deletar') {

        $tarefa = new Tarefa();
        $tarefa->__set('id_tarefa', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->deletarT();

        header('Location: todas_tarefas.php');

    }

?>
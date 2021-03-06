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
        $tarefa->__set('tarefa', $_POST['tarefa']); 
        $tarefa->__set('id_tarefa', $_POST['id_tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizarT();

        if($tarefaService->atualizarT()) {

            if(isset($_GET['pag']) && $_GET['pag'] == 'home'){
                header('Location: home.php?salvo=2');
            } else{
                header('Location: todas_tarefas.php?salvo=2');
            }
        } 

    } else if( $acao == 'deletarT') {

        $tarefa = new Tarefa();
        $tarefa->__set('id_tarefa', $_GET['id']);

        $conexao = new Conexao();
        $id = $_GET['id'];
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->deletarT($id);

        if(isset($_GET['pag']) && $_GET['pag'] == 'home'){
            header('Location: home.php?salvo=3');
        } else{
            header('Location: todas_tarefas.php?salvo=3');
        }
        
        
    } else if( $acao == 'realizarT') {

        $tarefa = new Tarefa();
        $tarefa->__set('id_tarefa', $_GET['id']);
        $tarefa->__set('id_status', 2); 

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->realizarT();

        if($tarefaService->realizarT()) {

            if(isset($_GET['pag']) && $_GET['pag'] == 'home'){
                header('Location: home.php?salvo=4');
            } else{
                header('Location: todas_tarefas.php?salvo=4');
            }
        } 
    } else if( $acao == 'pendentesT') { 
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendentesT();
    }
?>
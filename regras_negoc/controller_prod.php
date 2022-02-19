<?php 

    require "../regras_negoc/produto.model.php";
    require "../regras_negoc/produto_service.php";
    require "../regras_negoc/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserirP') {
        $produto = new Produto();
        $produto->__set('nome_prod', $_POST['nome_prod']);
        $produto->__set('descricao_prod', $_POST['descricao_prod']);
        $produto->__set('estoque_prod', $_POST['estoque_prod']);

        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);
        $produtoService->inserirP();

        header('Location: add_prod.php?salvo=1');

    } else if($acao == "recuperarP") {

        $produto = new Produto();
        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);
        $produtos = $produtoService->recuperarP();

    } else if($acao == 'atualizarP') {
        $produto = new Produto();
        $produto->__set('id_prod', $_POST['id_prod']);
        $produto->__set('nome_prod', $_POST['nome_prod']); 
        $produto->__set('descricao_prod', $_POST['descricao_prod']);
        $produto->__set('estoque_prod', $_POST['estoque_prod']);

        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);
        $produtoService->atualizarP();

        if($produtoService->atualizarP()) {
            header('Location: ../public/consultar_prod.php?salvo=2');
        } 
    }
    

?>
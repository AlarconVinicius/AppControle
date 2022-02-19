<?php 

    class ProdutoService {
        
        private $conexao;
        private $produto;

        public function __construct(Conexao $conexao, Produto $produto) {
            $this->conexao = $conexao->conectar();
            $this->produto = $produto;
        }
        public function inserirP() {
            $query = "insert into tb_produto (nome_prod, descricao_prod, estoque_prod) values (?, ?, ?)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->produto->__get('nome_prod'));
            $stmt->bindValue(2, $this->produto->__get('descricao_prod'));
            $stmt->bindValue(3, $this->produto->__get('estoque_prod'));
            $stmt->execute();
        }
        public function recuperarP() {
            $query = "select 
                        p.id_prod, p.nome_prod, p.descricao_prod, s.status, p.data_cadastro_prod, p.estoque_prod
                     from 
                        tb_produto as p
                     left join 
                        tb_status_prod as s
                     on (p.id_status = s.id_status)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function atualizarP() {
            $query = 'update tb_produto set nome_prod = ?, estoque_prod = ?, descricao_prod = ? where id_prod = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->produto->__get('nome_prod'));
            $stmt->bindValue(2, $this->produto->__get('estoque_prod'));
            $stmt->bindValue(3, $this->produto->__get('descricao_prod'));
            $stmt->bindValue(4, $this->produto->__get('id_prod'));
            return $stmt->execute();
        }
        public function deletarP() {
            
        }
        
    }

?>
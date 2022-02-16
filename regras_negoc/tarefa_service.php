<?php 

    class TarefaService {
 
        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa) {
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;   
        }
        public function inserirT() {
            $query = 'insert into tb_tarefa (tarefa)values(:tarefa)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->execute();
        }
        public function recuperarT() {
            $query = 'select t.id_tarefa, s.status, t.tarefa from tb_tarefa as t left join tb_status_tarefa as s on (t.id_status = s.id_status)';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
                        
        }
        public function atualizarT() {
            $query = 'update tb_tarefa set tarefa = ? where id_tarefa = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
            $stmt->bindValue(2, $this->tarefa->__get('id_tarefa'));
            return $stmt->execute();
        }
        public function deletarT() {
            $query = "delete from tb_tarefa where id_tarefa = ?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->tarefa->__get('id_tarefa '));
            $stmt->execute();
        }
        
    }

?>
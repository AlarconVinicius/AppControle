<?php


    class Login {
        
        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar(); 
        }
        public function logar($email, $senha) {
            $query = 'select * from tb_usuario where email = ? and senha = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, md5($senha));
            $stmt->execute();
            if($stmt->rowCount() == 1) {
                $usuario = $stmt->fetch();

                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nome'] = $usuario['nome'];
                
                return true;
            } else {
                
                return false;
            }

        }
    }

?>
<?php 

    class Produto {

        private $id_prod;
        private $nome_prod;
        private $descricao_prod;
        private $id_status;
        private $data_cadastro_prod;
        private $estoque_prod;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            return $this->$atributo = $valor;
        }
    }

?>
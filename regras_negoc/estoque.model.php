<?php 
    #######################################
    ##MEXER AINDA
    #######################################
    class Estoque {

        private $id;
        private $nome_prod;
        private $descricao_prod;
        private $id_status;
        private $data_cadastro_prod;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            return $this->$atributo = $valor;
        }
    }

?>
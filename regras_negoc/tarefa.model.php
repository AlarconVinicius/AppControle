<?php
    //2
    class Tarefa {

        private $id_tarefa;
        private $id_status;
        private $tarefa;
        private $data_tarefa;

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo,$valor) {
            return $this->$atributo = $valor;
        }
    }   
?>
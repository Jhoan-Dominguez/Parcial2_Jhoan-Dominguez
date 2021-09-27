<?php
    class conexion{
        private $mysqli;
        private $resultado;

        public function abrir(){
            $this -> mysqli = new mysqli("localhost", "root", "", "itiud_icai-s");
            $this -> mysqli -> set_charset("utf-8");
        }

        public function cerrar(){
            $this -> mysqli -> close();
        }

        public function ejecutar($sentencia){
            $this -> resultado = $this -> mysqli -> query($sentencia);
        }

        public function extraer(){
            return $this -> resultado -> fetch_row();
        }
    }
?>
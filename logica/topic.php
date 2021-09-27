<?php
    require_once "persistencia/conexion.php";
    require_once "persistencia/topicDAO.php";

    class topic{
        private $idTopic;
        private $name;
        private $conexion;
        private $topicDAO;

        /**
         * @return
         */
        public function getidTopic(){
            return $this -> idTopic;
        }

        /**
         * @return
         */
        public function getname(){
            return $this -> name;
        }

        /**
         * @return
         */
        public function getconexion(){
            return $this -> conexion;
        }

        /**
         * @return
         */
        public function gettopicDAO(){
            return $this -> topicDAO;
        }

        public function topic( $idTopic=0, $name=""){
            $this -> idTopic = $idTopic;
            $this -> name = $name;
            $this -> conexion = new conexion();
            $this -> topicDAO = new topicDAO( $this->idTopic, $this->name );
        }

        public function consultar(){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->topicDAO->consultarTodos());
            $topics = Array();
            while ( ($resultado = $this->conexion->extraer()) != null ){
                array_push($topics, new topic($resultado[0], $resultado[1]));
            }
            $this->conexion->cerrar();
            return $topics;
        }
    }
?>
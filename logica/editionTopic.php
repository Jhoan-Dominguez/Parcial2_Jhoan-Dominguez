<?php
    require_once "persistencia/conexion.php";
    require_once "persistencia/editionTopicDAO.php";

    class editionTopic{
        private $idEditionTopic;
        private $accepted;
        private $rejected;
        private $edition_idEdition;
        private $topic_idTopic;
        private $conexion;
        private $editionTopic;

        /**
         * @return
         */
        public function getidEditionTopic(){
            return $this -> idEditionTopic;
        }

        /**
         * @return
         */
        public function getaccepted(){
            return $this -> accepted;
        }

        /**
         * @return
         */
        public function getrejected(){
            return $this -> rejected;
        }

        /**
         * @return
         */
        public function getedition_idEdition(){
            return $this -> edition_idEdition;
        }

        /**
         * @return
         */
        public function gettopic_idTopic(){
            return $this -> topic_idTopic;
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
        public function geteditionTopic(){
            return $this -> editionTopic;
        }

        public function editionTopic( $idEditionTopic = 0, $accepted = 0, $rejected = 0, $edition_idEdition = 0, $topic_idTopic = 0){
            $this -> idEditionTopic = $idEditionTopic;
            $this -> accepted = $accepted;
            $this -> rejected = $rejected;
            $this -> edition_idEdition = $edition_idEdition;
            $this -> topic_idTopic = $topic_idTopic;
            $this -> conexion = new conexion();
            $this -> editionTopicDAO = new editionTopicDAO( $this->idEditionTopic, $this->accepted, $this->rejected, 
            $this->edition_idEdition, $this->topic_idTopic );
        }

        public function consultarEditionTopic($idEdition){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->editionTopicDAO->consultarEditionTopic($idEdition));
            $editionTopics = Array();
            while (($resultado = $this->conexion->extraer()) != null){
                array_push($editionTopics, new editionTopic($resultado[0], $resultado[1], $resultado[2], $resultado[3],
                $resultado[4]));
            }
            $this->conexion->cerrar();
            return $editionTopics;
        }

        public function sumaEditionTopic($idTopic, $idEdition){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->editionTopicDAO->sumaEditionTopic($idTopic, $idEdition));
            $acceptedAndRejected = Array();
            while (($resultado = $this->conexion->extraer()) != null){
                array_push($acceptedAndRejected, $resultado[0], $resultado[1] );
            }
            $this->conexion->cerrar();
            return $acceptedAndRejected;
        }

        public function consultar(){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->editionTopicDAO->consultarTodos());
        }
    }
?>
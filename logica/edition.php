<?php
    require_once "persistencia/conexion.php";
    require_once "persistencia/editionDAO.php";

    class edition{
        private $idEdition;
        private $name;
        private $year;
        private $startDate;
        private $endDate;
        private $internationalCollaboration;
        private $numberOfKeynotes;
        private $conexion;
        private $editionDAO;

        /**
         * @return
         */
        public function getidEDition(){
            return $this -> idEdition;
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
        public function getyear(){
            return $this -> year;
        }

        /**
         * @return
         */
        public function getstartDate(){
            return $this -> startDate;
        }

        /**
         * @return
         */
        public function getendDate(){
            return $this -> endDate;
        }

        /**
         * @return
         */
        public function getinternationalCollaboration(){
            return $this -> internationalCollaboration;
        }

        /**
         * @return
         */
        public function getnumberOfKeynotes(){
            return $this -> numberOfKeynotes;
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
        public function geteditionDAO(){
            return $this -> editionDAO;
        }

        public function edition( $idEdition=0, $name="", $year=0, $startDate=0, $endDate=0, $internationalCollaboration=0, $numberOfKeynotes=0 ){
            $this -> idEdition = $idEdition;
            $this -> name = $name;
            $this -> year = $year;
            $this -> startDate = $startDate;
            $this -> endDate = $endDate;
            $this -> internationalCollaboration = $internationalCollaboration;
            $this -> numberOfKeynotes = $numberOfKeynotes;
            $this -> conexion = new conexion();
            $this -> editionDAO = new editionDAO( $this->idEdition, $this->name, $this->year, $this->startDate,
            $this->endDate, $this->internationalCollaboration, $this->numberOfKeynotes );
        }

        public function consultar(){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->editionDAO->consultarTodos());
            $editionYears = Array();
            while ( ($resultado = $this->conexion->extraer()) != null){
                array_push($editionYears, new edition( $resultado[0], $resultado[1], $resultado[2], $resultado[3], 
                $resultado[4], $resultado[5], $resultado[6] ));
            }
            $this->conexion->cerrar();
            return $editionYears;
        }
    }
?>
<?php
    class editionDAO{
        private $idEdition;
        private $name;
        private $year;
        private $startDate;
        private $endDate;
        private $internationalCollaboration;
        private $numberOfKeynotes;

        public function editionDAO( $idEdition, $name, $year, $startDate, $endDate, $internationalCollaboration, $numberOfKeynotes ){
            $this -> idEdition = $idEdition;
            $this -> name = $name;
            $this -> year = $year;
            $this -> startDate = $startDate;
            $this -> endDate = $endDate;
            $this -> internationalCollaboration = $internationalCollaboration;
            $this -> numberOfKeynotes = $numberOfKeynotes;
        }

        public function consultarEdition ($year){
            return "select idEdition 
                    from Edition 
                    WHERE Edition.year = '". $year ."'";
        }

        public function consultarTodos(){
            return "select *
                    from Edition ";
        }
    }
?>
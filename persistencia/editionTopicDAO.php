<?php
    class editionTopicDAO{
        private $idEditionTopic;
        private $accepted;
        private $rejected;
        private $edition_idEdition;
        private $topic_idTopic;
    
        public function editionTopicDAO( $idEditionTopic = 0, $accepted, $rejected, $edition_idEdition, $topic_idTopic ){
            $this -> idEditionTopic = $idEditionTopic;
            $this -> accepted = $accepted;
            $this -> rejected = $rejected;
            $this -> edition_idEdition = $edition_idEdition;
            $this -> topic_idTopic = $topic_idTopic;
        }
        
        public function consultarEditionTopic( $idEdition ){
            return "select *
                    from EditionTopic
                    WHERE EditionTopic.edition_idEdition = '". $idEdition ."'" ;
        }

        public function sumaEditionTopic( $idTopic, $idEdition ){
            return "select SUM(accepted), SUM(rejected)
                    from EditionTopic
                    WHERE EditionTopic.topic_idTopic = '". $idTopic ."' AND EditionTopic.edition_idEdition = '". $idEdition ."'" ;
        }

        public function consultarTodos(){
            return "select *
                    from EditionTopic";
        }
    }
?>
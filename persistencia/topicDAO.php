<?php
    class topicDAO{
        private $idTopic;
        private $name;
    
        public function topicDAO( $idTopic, $name ){
            $this -> idTopic = $idTopic;
            $this -> name = $name;
        }

        public function consultarTodos(){
            return "select *
                    from Topic";
        }
    }
?>
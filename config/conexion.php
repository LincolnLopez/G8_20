<?php
    class conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh  = new PDO("mysql:host=34.68.196.220;dbname=g8_20","G8_20","mcdxYXrx");
                return $conectar;
            }catch(Exception $e) {
                print "¡Error BD!: " . $e->GetMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>


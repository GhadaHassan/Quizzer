<?php

    // this is for connected DB
    include 'constains.php';

    class DATABASE{

        private $DB;

        public function __construct ($name_db){
            $this->DB = new mysqli(DB_HOST, DB_USER, DB_PASS);
            if( $this->DB->connect_error){
                printf(' Connect Failed: %s\n'.$this->DB->connect_error);
            }
            // else{
            //     printf("Connected");
            // }
        }

        // public function myExce($q){
        //     $this->DB = $mysql
        // }
    }

    $DB = new DATABASE(DB_DATABASE);

?>
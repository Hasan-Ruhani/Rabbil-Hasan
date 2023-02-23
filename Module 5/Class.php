<?php
    class myClass {
        private $companyName = "ABC Limited";    //use personaly
        public $myName = "H A S A N";    //use anywhere

        private function into(){    //use privately
            echo 5*5;
        }
        public function plus(){     //use anywhere
            echo 5+5;
        }

        protected $companyAddress = "Khulna";     //use specifically

        function __construct($msg){   //use do not create object
            echo $msg;
        }

        static function addTwoNumber(){  //use do not create object
            echo 5+7;
        }
    }


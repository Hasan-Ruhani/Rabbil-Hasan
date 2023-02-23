<?php
    class father{
        public function into(){
            echo 5*5;
        }
    }

    // abstract class father{       //if you absolutely do not use this function so use (abstract)
    //     public function into(){
    //         echo 5*5;
    //     }
    // }

    class son extends father{
        public function into(){
            echo 5*2;
        }
    }

    $sonObj = new son();
    $sonObj -> into();






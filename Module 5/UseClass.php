<?php
    include_once("Class.php");

    $output = new myClass("I"."'"."m constructor". "\n");  //send to __construct

    echo $output -> myName."\n";

    myClass::addTwoNumber();
<?php
    function cashWithdraw($cash){
        $balance = 10000;
        if($cash > $balance){
            throw new Exception("Insufficiant Found");
        }
        return true;
    }

    try{
        cashWithdraw(200000);
        echo "Success";
    }

    catch(Exception $e){
        echo ($e -> getMessage());
    }

    // function checkNumber($num){
    //     if($num >= 1){
    //         throw new Exception("Value must be less than 1");
    //     }
    //     return true;
    // }

    // try{
    //     checkNumber(5);
    //     echo "If you see theis text, the passed value is less than 1";
    // }

    // catch(Exception $e){
    //     echo "Exception Message :" .$e -> getMessage();
    // }

    // finally{
    //     echo "\n It is finally block, wich always executes.";
    // }
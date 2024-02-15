<?php
    //...................AM/PM......................
    date_default_timezone_set('Asia/Dhaka');
    echo "1. ".date("h:i:sa"). "\n"; //for 12 hours formate.............1
    echo "2. ".date("H:i:s"). "\n"; //for 24 hours formate..............2

//......if you add days/years/months with your fixed date..........
    $myDate = date_create("2023-03-09");
    date_add($myDate, date_interval_create_from_date_string("5 days"));  //date_add for increase the date
    $newDate = date_format($myDate, "Y-m-d");
    echo "3. ".$newDate."\n";   

    $myDate = date_create("2023-03-09");
    date_sub($myDate, date_interval_create_from_date_string("5 days"));  //date_add for decrease the date
    $newDate = date_format($myDate, "Y-m-d");
    echo "4. ".$newDate."\n";  //.................4

    //..............difference between two dates..................
    $date1 = date_create("2023-01-09");
    $date2  = date_create("2023-04-20");
    $diff = date_diff($date1, $date2);
    echo "5. ".$diff -> format("%R%a days")."\n";  //...........5

    //.............make time fixed which is same all over the world............
    $unix = date_create();
    echo "6. ".date_timestamp_get($unix). " " . "sec" . "\n";   //............6

    $date3 = strtotime("12th jun, 2023");
    echo "7. ".$date3." " . "sec". "\n";    //...........................7

    //...................difference between two dates...............
    $date4 = new DateTime("1:30:15am 1st jan 2022");
    $date5 = new DateTime("8:45:16pm 28th feb 2024");

    $diff = date_diff($date4, $date5);     //.....methode 01
    // $diff = $date4 -> diff($date5);     //.....methode 02
    // echo $diff -> y>0 ? $diff -> y. "year ": '';
    // echo $diff -> m>0 ? $diff -> m. "month ": '';
    // echo $diff -> d>0 ? $diff -> d. "day \n": '';

    echo "8.". formateNumber ($diff -> y, "year") .   //...........8
         formateNumber ($diff -> m, "month") .
         formateNumber ($diff -> d, "day") .
         formateNumber ($diff -> h, "hour") .
         formateNumber ($diff -> i, "minute") .
         formateNumber ($diff -> s, "second");
    function formateNumber($number, $type){
        if($number == 0){
            return '';
        }
        if($number > 1){
            return " {$number} {$type}s";
        }
        
        return " {$number} {$type}";
    }

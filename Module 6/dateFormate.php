<?php
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
    echo "6. ".date_timestamp_get($unix);   //............6

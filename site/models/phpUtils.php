<?php

function parse_month($month)
{

    $monthArr = ['','January','Februari','March','April','May','June','July','August','September','Oktober','November','December'];

    return $monthArr[$month];

}


function singleNumber($month)
{
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);
    $getMonth = str_replace('01', 'January', $month);


   return $getMonth;

}

 ?>

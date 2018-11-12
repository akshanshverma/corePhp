<?php

function validInt($int, $min, $max)
{
    //check number is valid or not
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("invalid input\n");
        echo "enter again : ";
        $int = getInt();
    }
    return $int;
}

function getInt()
       {
            fscanf(STDIN,"%d\n",$n);
            while(!is_numeric($n))
            {
                echo "enter numeric value"."\n";
                fscanf(STDIN,"%d\n",$n);
            }
            return $n;     
       }
?>
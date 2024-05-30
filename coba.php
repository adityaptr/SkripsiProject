<?php
    $N = "AZ";
    $NI = 71;
    if ($NI >= 80 && $NI <= 100) {
        $H = "X";
    }
    else if ($NI >= 60){ $H="Y"; }
    else if ($NI >= 40){ $H="Z"; }
    else if ($NI >= 20){ $H="A"; }
    else if ($NI >= 0){ $H="B"; }
    echo "GOOD";
?>
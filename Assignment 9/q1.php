<?php
    $Students=["Rahul" => 85, "Priya" => 92,"Arun" => 78, "Sneha" => 84, "Rithik" => 92, "Adwaith" => 98];
    arsort($Students);
    echo "<h2> Top 3 Students </h2>";
    echo "<table border=1>";
    echo "<tr><th>Name</th><th>Marks</th></tr>";
    $counter=0;
    foreach($Students as $name => $value){
        if($counter < 3){
            echo "<tr><td>$name</td><td>$value</td></tr>";
            $counter++;
        }else{
            break;
        }
    }
    echo "</table>";
?>
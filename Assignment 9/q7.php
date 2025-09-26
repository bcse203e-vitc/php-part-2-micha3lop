<?php
class EmptyArrayException extends Exception {}

function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided");
    }

    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}

$numbers = [10, 20, 30, 40, 50]; 
foreach ($numbers as $number) {
    echo $number ." ";
}
try {
    $average = calculateAverage($numbers);
    echo "<h2>Average of Numbers: $average</h2>";
} catch (EmptyArrayException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>

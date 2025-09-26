<?php

$inputFile = "data.txt";
$outputFile = "numbers.txt";

if (!file_exists($inputFile)) {
    die("Error: data.txt not found.");
}

$content = file_get_contents($inputFile);


preg_match_all('/\b\d{10}\b/', $content, $matches);

$mobileNumbers = $matches[0];

if (!empty($mobileNumbers)) {
    file_put_contents($outputFile, implode(PHP_EOL, $mobileNumbers));
    echo "<h3>Extracted Mobile Numbers:</h3><pre>" . implode("\n", $mobileNumbers) . "</pre>";
    echo "<p>Saved to <strong>$outputFile</strong></p>";
} else {
    echo "<p>No valid mobile numbers found in the file.</p>";
}
?>

<?php
$filename = "q2.txt";
$products = [];

if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($name, $price) = explode(",", $line);
        $products[] = ["name" => $name, "price" => (int)$price];
    }

    usort($products, function($a, $b) {
        return $a['price'] <=> $b['price'];
    });

    echo "<h2>Sorted Product List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Product Name</th><th>Price (₹)</th></tr>";
    foreach ($products as $product) {
        echo "<tr><td>{$product['name']}</td><td>{$product['price']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Error: File 'products.txt' not found.</p>";
}
?>
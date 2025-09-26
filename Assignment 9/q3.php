<?php
$emails = [
    "john@example.com",
    "wrong-email@",
    "me@site",
    "user123@gmail.com",
    "admin@domain.co.in",
    "noatsymbol.com",
    "test@.com",
    "test.tesr12123@gmail.ac.in"
];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/i";
echo "<h2>Email Addresses</h2>";
echo "<ul>";
foreach ($emails as $email) {
    echo "<li>$email</li>";
}
echo "</ul>";
echo "<h2>Valid Email Addresses</h2>";
echo "<ul>";
foreach ($emails as $email) {
    if (preg_match($pattern,$email)) {
        echo "<li>$email</li>";
    }
}
echo "</ul>"
?>

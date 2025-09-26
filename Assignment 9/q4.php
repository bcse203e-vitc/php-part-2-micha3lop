<?php
class PasswordException extends Exception {}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long.");
    }
    if (!preg_match('/[A-Z]/', $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter.");
    }

    if (!preg_match('/\d/', $password)) {
        throw new PasswordException("Password must contain at least one digit.");
    }

    if (!preg_match('/[@#$%]/', $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %).");
    }

    return true;
}
$password = "MyPass@123"; 
echo "Password:$password";
try {
    if (validatePassword($password)) {
        echo "<p style='color:green;'>Password is valid</p>";
    }
} catch (PasswordException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>

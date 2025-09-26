<?php
date_default_timezone_set("Asia/Kolkata");

$inputFile = "students.txt";
$errorFile = "errors.log";
$validStudents = [];
$invalidEntries = [];

$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/i";

if (file_exists($inputFile)) {
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $fields = explode(",", $line);

        if (count($fields) !== 3) {
            $invalidEntries[] = $line;
            continue;
        }

        list($name, $email, $dob) = $fields;

        if (!preg_match($emailPattern, $email)) {
            $invalidEntries[] = $line;
            continue;
        }

        try {
            $birthDate = new DateTime($dob);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;

            $validStudents[] = [
                "name" => $name,
                "email" => $email,
                "age" => $age
            ];
        } catch (Exception $e) {
            $invalidEntries[] = $line;
        }
    }

    if (!empty($invalidEntries)) {
        file_put_contents($errorFile, implode(PHP_EOL, $invalidEntries));
    }

    echo "<h2>Valid Student Records</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";

    foreach ($validStudents as $student) {
        echo "<tr>
                <td>{$student['name']}</td>
                <td>{$student['email']}</td>
                <td>{$student['age']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='color:red;'>Error: File '$inputFile' not found.</p>";
}
?>

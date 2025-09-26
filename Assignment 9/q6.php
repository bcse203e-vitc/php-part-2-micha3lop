<!DOCTYPE html>
<html>
<head>
  <title>Birthday Countdown</title>
</head>
<body>

<form method="post">
  <label for="dob">Enter your Date of Birth (YYYY-MM-DD):</label><br>
  <input type="date" name="dob" required>
  <br><br>
  <input type="submit">
</form>

<?php
date_default_timezone_set("Asia/Kolkata");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"];
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $nextBirthday = DateTime::createFromFormat('Y-m-d', $today->format('Y') . '-' . $birthDate->format('m-d'));

    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    echo "<h3>Your next birthday is in <strong>{$interval->days}</strong> day(s).</h3>";
}
?>

</body>
</html>

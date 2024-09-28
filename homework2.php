<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form method="post" action="process.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <input type="submit" value="Submit">
</form> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    echo "Hello, " . htmlspecialchars($name) . "!";
}
?> 
</body>

</html>
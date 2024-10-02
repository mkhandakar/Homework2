<!DOCTYPE html>
<html>
<head>
    <title>Math Calculator</title>
</head>
<body>
    <h1>Math Calculator</h1>
    <form action="result.php" method="post">
        <input type="text" name="input1" required>
        <input type="text" name="operator1" required>
        <input type="text" name="input2" required>
        <input type="text" name="operator2" required>
        <input type="text" name="input3" required>
        <button type="submit">Calculate</button>
    </form>
    <?php
// Get the input values from the form
$input1 = $_POST['input1'];
$operator1 = $_POST['operator1'];
$input2 = $_POST['input2'];
$operator2 = $_POST['operator2'];
$input3 = $_POST['input3'];

// Validate input
if (!is_numeric($input1) || !is_numeric($input2) || !is_numeric($input3) ||
    !in_array($operator1, ['+', '-', '*', '/']) || !in_array($operator2, ['+', '-', '*', '/'])) {
    echo "ERROR: Invalid input. Please enter numbers and valid operators (+, -, *, /).";
    exit;
}

// Perform calculations with operator precedence
if ($operator1 === '*' || $operator1 === '/') {
    $result = eval("($input1 $operator1 $input2) $operator2 $input3");
} else {
    $result = eval("$input1 $operator1 $input2 $operator2 $input3");
}

// Print the result
echo "Result: " . number_format($result, 10, '.', '');
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Math Calculator</title>
</head>
<body>
    <h1>Math Calculator</h1>
    <form action="calculate.php" method="post">
        <input type="number" name="num1" required>
        <input type="text" name="operator" required>
        <input type="number" name="num2" required>
        <button type="submit">Calculate</button>
    </form>
    <?php
// Get the input values from the form
$num1 = $_POST['num1'];
$operator = $_POST['operator'];
$num2 = $_POST['num2'];

// Perform the calculation with operator precedence
switch ($operator) {
    case '*':
        $result = $num1 * $num2;
        break;
    case '/':
        if ($num2 == 0) {
            die("Division by zero is not allowed.");
        }
        $result = $num1 / $num2;
        break;
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    default:
        die("Invalid operator.");
}

// Display the result
echo "<h1>Result: $result</h1>";
?>
</body>
</html>
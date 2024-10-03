<!DOCTYPE html>
<html>
<head>
    <title>Math Calculator</title>
</head>
<body>
    <h1>Math Calculator</h1>
    <form action="" method="post">
        <input type="number" name="num1" required>
        <input type="text" name="operator" required>
        <input type="number" name="num2" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = filter_var($_POST['num1'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operator = filter_var($_POST['operator'], FILTER_SANITIZE_STRING);
        $num2 = filter_var($_POST['num2'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

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

        echo "<h1>Result: $result</h1>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Math Calculator</title>
</head>
<body>
    <h1>Math Calculator</h1>
    
    <form action="" method="post"> 
        <input type="text" name="input1" required>
        <input type="text" name="operator1" required>
        <input type="text" name="input2" required>
        <input type="text" name="operator2" required>
        <input type="text" name="input3" required>
        <button type="submit">Calculate</button>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Use filter_va function to validate the input , FILTER_SANITIZE_NUMBER_FLOAT , FILTER_SANITIZE_STRING
        $input1 = filter_var($_POST['input1'] , FILTER_SANITIZE_NUMBER_FLOAT , FILTER_FLAG_ALLOW_FRACTION);
        $operator1 = filter_var($_POST['operator1'] , FILTER_SANITIZE_STRING);
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

    }

        // Function to apply the operator safely
        function apply_operator($num1, $operator, $num2) {
            switch ($operator) {
                case '+':
                    return $num1 + $num2;
                case '-':
                    return $num1 - $num2;
                case '*':
                    return $num1 * $num2;
                case '/':
                    if ($num2 == 0) {
                        die("ERROR: Division by zero is not allowed.");
                    }
                    return $num1 / $num2;
                default:
                    die("ERROR: Invalid operator.");
            }
        }

   







?>
</body>
</html>
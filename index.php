<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <h1>Calculator</h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

  <input name="num01" type="number" placeholder="enter your first number"></input>
  <br>
  <select name="operator">
     <option value="+">Addition (+)</option>
     <option value="-">Subtraction (-)</option>
     <option value="*">Multiplication (*)</option>
     <option value="/">Division (/)</option>
 </select>
 <br>
 <input name="num02" type="number" placeholder="enter your second number"></input>
 <br>
 <button type="submit" name="submit">Calculate</button>
</form>

<?php
if(isset($_POST['submit'])) {
    $num01 = htmlspecialchars($_POST["num01"]);
    $num02 = htmlspecialchars($_POST["num02"]);
    $op = htmlspecialchars($_POST["operator"]);
    $error = false;

    if(empty($num01) || empty($num02) || !isset($op)) {
        $error = true;  
    }

    if($error) {
        echo "Please fill all the fields";
    } else {
        if(is_numeric($num01) && is_numeric($num02)) {
            $result = 0;
            switch($op) {
                case '+':
                    $result = $num01 + $num02;
                    break;
                case '-':
                    $result = $num01 - $num02;
                    break;
                case '*':
                    $result = $num01 * $num02;
                    break;
                case '/':
                    if ($num02 != 0) {
                        $result = $num01 / $num02;
                    } else {
                        echo "Division by zero is not allowed.";
                    }
                    break;
                default:
                    echo "<p>No operation</p>";
                    break;
            }
            echo "The result is: " . $result;
        }
    }
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
    <title>PHP 13C</title>
    <META name="description" content="php13C.php">
</head>
<body>
    <h1>Variable-length Argument Lists</h1>
    <?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
    
    function reduceOp() {
        $args = func_get_args();
        if (count($args) < 1) {
            throw new Exception();
        }

        $op = array_pop($args);
        if (!is_array($op) || !array_key_exists('op', $op)) {
            throw new Exception("TypeError");
        }

        $op = $op['op'];
        if (!in_array($op, ['+', '-', '*'])) {
            throw new Exception("ValueError");
        }

        if (count($args) === 0)
            return null;

        $result = array_shift($args);
        foreach($args as $number) {
            switch($op) {
                case '+':
                    $result += $number;
                    break;
                case '-':
                    $result -= $number;
                    break;
                case '*';
                    $result *= $number;
                    break;
                default:
                    break;
            }
        }

        return $result;
    }
    
    try {
        echo "1: ", reduceOp(2,3), "<br>\n"; # throws an exception
    }
    catch (Exception $e) {
        echo "1: Exception ",$e->getMessage(),"<br>\n"; # ’TypeError’
    }
    try {
        echo "2: ",reduceOp(2,3,array('op' => '/')), "<br>\n"; # throws an exception
    }
    catch (Exception $e) {
        echo "2: Exception ",$e->getMessage(),"<br>\n"; # 'ValueError'
    }
    echo "3: ",reduceOp(array('op'=>'+')), "<br>\n"; # should return NULL
    echo "4: ",reduceOp(2,array('op' => '*')),"<br>\n"; # should return 2
    echo "5: ",reduceOp(2,3,5,array('op' => '+')),"<br>\n"; # should return 10
    echo "6: ",reduceOp(2,3,5,7,array('op' => '*')),"<br>\n"; # should return 210
    echo "7: ",reduceOp(2,3,5,7,11,array('op' => '-')),"<br>\n"; # should return -24
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <title>PHP 11B</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        echo "<h2>Types and Type Casting</h2>\n";

        $mode = rand(1,4);
        if ($mode == 1)
            $randvar = rand();
        elseif ($mode == 2)
            $randvar = (string) rand();
        elseif ($mode == 3)
            $randvar = rand()/(rand()+1);
        else
            $randvar = (bool) $mode;

        echo "Random scalar: $randvar<br>\n";

        switch (gettype($randvar)) {
            case 'integer':
                echo "This is an integer";
                break;
            case 'double':
                echo "This is a floating-point number";
                break;
            case 'string':
                echo "This is a string";
                break;
            default:
                echo "I don't know what this is";
                break;
        }
        ?>
    </body>
</html>
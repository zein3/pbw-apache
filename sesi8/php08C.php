<!DOCTYPE html>
<html>
<head>
    <title>PHP 12B</title>
</head>
<body>
    <h1>Array Operators and Regular Expressions</h1>
    <?php
    echo "<h2>Exercise 2a</h2>";
    $planets = array("earth");
    array_unshift($planets, "mercury", "venus");
    array_push($planets, "mars", "jupiter", "saturn");
    echo "(1) \$planets = [",join(", ",$planets),"]<br>\n";
    $last = array_pop($planets);
    echo "(2) \$planets = [",join(", ",$planets),"]<br>\n";
    $first = array_shift($planets);
    echo "(3) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(4) \$first = $first, \$last = $last<br>\n";

    echo "<h2>Exercise 2c</h2>\n";
    $spheres = $planets;
    echo "(5) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $planets[1] = "midgard";
    echo "(6) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(6) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $spheres = &$planets;
    echo "(7) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $planets[0] = "friga";
    echo "(8) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(8) \$spheres = [",join(", ",$spheres),"]<br>\n";

    echo "<h2>Exercise 2d</h2>";
    while (count($planets) !== 0) {
        $removed = array_shift($planets);
        echo "Removed: $removed. Remaining: [", join(", ", $planets), "]<br>\n";
    }

    echo "<h2>Exercise 3</h2>";
    $names = ["Dave Shield", "Mr Andy Roxburgh", "Dr George Christodoulou", "Dr Ullrich Hustadt", "Dr David Jackson"];
    foreach ($names as $name)
        echo "(1) Name: $name<br>\n";

    // Your own code here
    foreach ($names as $i => $name) {
        $nameParts = explode(" ", $name);
        $n = count($nameParts);
        if ($n < 2) {
            return;
        }

        $names[$i] = strtoupper($nameParts[$n - 1]).", ".ucfirst($nameParts[$n - 2]);
    }

    foreach ($names as $name)
        echo "(2) Name: $name<br>\n";
    ?>
</body>
</html>
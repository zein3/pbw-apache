<!DOCTYPE html>
<html>
<head>
    <title>PHP 08D</title>
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Associative Arrays</h1>
    <?php
    $dict1 = array('a' => 1, 'b' => 2);
    $dict2 = $dict1;
    $dict1['b'] = 4;
    echo "\$dict1['b'] = ", $dict1['b'],"<br>\n";
    echo "\$dict2['b'] = ", $dict2['b'],"<br>\n";

    echo "Isi \$dict1:<br>\n";
    foreach ($dict1 as $key => $value) {
        echo "\$dict1['$key'] = $value<br>\n";
    }

    echo "<hr>\n";
    $text = "lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit";
    $dict3 = [];
    foreach(explode(" ", $text) as $word) {
        if (array_key_exists($word, $dict3)) {
            $dict3[$word]++;
        } else {
            $dict3[$word] = 1;
        }
    }

    arsort($dict3);
    // foreach($dict3 as $word => $count) {
    //     echo "$word -> $count<br>\n";
    // }
    ?>
    <table>
        <thead>
            <th>Kata</th>
            <th>Jumlah kemunculan</th>
        </thead>
        <tbody>
            <?php foreach($dict3 as $word => $count): ?>
                <tr>
                    <td><?= $word ?></td>
                    <td><?= $count ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
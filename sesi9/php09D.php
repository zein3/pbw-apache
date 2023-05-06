<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP09 D</title>

    <style>
        table, th, td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th, td {
            padding: 0.2rem 0.3rem;
        }

        table {
            margin: 0.4rem;
        }
    </style>
</head>
<body>
    <h1>PHP and Databases</h1>
    <?php
    $db_hostname = "localhost";
    $db_database = "sembilan"; // Write your own db name here
    $db_username = "sembilan"; // Write your own username here
    $db_password = "sembilan"; // Write your own password here. For the best practice, don’t use your “real” password when submitting your work
    $db_charset = "utf8mb4"; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        // echo "<h2>Data in meeting table (While loop)</h2>\n";

        $stmt = $pdo->query("select * from meetings order by slot asc");
        echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n";
        // while ($row = $stmt->fetch()) {
        //     echo "Slot: ",$row["slot"], "<br>\n";
        //     echo "Name: ",$row["name"], "<br>\n";
        //     echo "Email: ",$row["email"],"<br><br>\n";
        // }

        // echo "<h2>Data in meeting table (Foreach loop)</h2>\n";
        // $stmt = $pdo->query("select * from meetings");
        // foreach($stmt as $row) {
        //     echo "Slot: ",$row["slot"], "<br>\n";
        //     echo "Name: ",$row["name"], "<br>\n";
        //     echo "Email: ",$row["email"],"<br><br>\n";
        // }
        ?>

        <h2>Data in meeting table</h2>
        <table>
            <thead>
                <tr>
                    <th>Slot</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stmt as $row): ?>
                    <tr>
                        <td><?= $row['slot'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php
        $pdo = NULL;
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
    ?>

</body>
</html>
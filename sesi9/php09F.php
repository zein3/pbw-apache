<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP09 F</title>

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
    <h1>Data Meeting</h1>
    <a href="./php09E.php">Tambah data</a>
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

        $stmt = $pdo->query("select * from meetings order by slot asc");
        ?>

        <table>
            <thead>
                <tr>
                    <th>Slot</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stmt as $row): ?>
                    <tr>
                        <td><?= $row['slot'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td style="display: flex; flex-direction: row;">
                            <a href="<?= "./php09G.php?slot=".$row['slot'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: blue;">
                                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                </svg>
                            </a>
                            <a href="<?= "./php09H.php?slot=".$row['slot'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: red;">
                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </td>
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
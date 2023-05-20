<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="./php11D_action.php" method="POST">
        <table>
            <tr>
                <td>
                    <label>Username:</label>
                </td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password:</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
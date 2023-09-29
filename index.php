<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Object-oriented PHP and MySQL</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">USERS</a></li>
            <li><a href="registration.php">REGISTER</a></li>
        </ul>
    </nav>
    <main class="table">
        <section class="table__header">
            <div class="input-group">
            </div>
         
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Profile<span class="icon-arrow">&UpArrow;</span></th>
                        <th>First name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Last name <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email address<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Contact <span class="icon-arrow">&UpArrow;</span></th>
                        <th>City <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'config.php';
                    require_once 'dbconn.php';
                 

                    $dbConn = new DBConn();
                    $userData = $dbConn->getAllUsers();

                    foreach ($userData as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['id'] . "</td>";
                        echo "<td><img src='" . $user['profile_image'] . "' alt='Profile Image'></td>";
                        echo "<td>" . $user['first_name'] . "</td>";
                        echo "<td>" . $user['last_name'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>" . $user['contact'] . "</td>";
                        echo "<td>" . $user['city'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>

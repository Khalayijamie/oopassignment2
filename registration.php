<?php
require_once 'config.php';
require_once 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dbConn = new DBConn();

    
    $profileImage = '';

    if ($_FILES['profile_image']['error'] === 0) {
        $uploadDir = './images/uploaded'; 
        $uploadFile = $uploadDir . basename($_FILES['profile_image']['name']);

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadFile)) {
            $profileImage = $uploadFile;
        }
    }


    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact'],
        'city' => $_POST['city'],
        'profile_image' => $profileImage, 
    ];

    $table = 'users';

    $success = $dbConn->insert($table, $data);

    if ($success) {
        echo "Registration successful!";
    } else {
        echo "Error  in the registration!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">USERS</a></li>
            <li><a href="registration.php">REGISTER</a></li>
        </ul>
    </nav>
    <section>
        <div class="inner">
            <div class="image-holder">
                <img src="./images/style_images/OIP.jpg" alt="image">
            </div>
            <form method="post" action="registration.php" enctype="multipart/form-data">
                <h3>Registration Form</h3>
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="contact" placeholder="Contact" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="city" placeholder="City" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="file" name="profile_image" accept="image/*">
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </section>
</body>
</html>

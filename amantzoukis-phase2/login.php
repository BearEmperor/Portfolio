<?php
session_start();

if(isset($_POST['Email']) && isset($_POST['Password'])) {
    $conn = new mysqli("127.0.0.1", "root", "", "phase2");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_email'] = $email;
        $_SESSION['user_firstname'] = $row['firstName'];
        $_SESSION['user_lastname'] = $row['lastName'];
        header("Location: Blog.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andreas Mantzoukis - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/addPost-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/addPost-Desktop.css" media="screen and (min-width:769px)">

    
</head>
<body>
    
    <aside>
    <form  method="post" action="login.php">
            <fieldset>
                <p><label for="Email" class="source-code" id="label1">User email:</label>
                <input  type="email" name="Email" id="Email" placeholder="Enter email">
                </p>
                <p>
                <label for="Password" class="source-code">Password:</label>
                <input class = "flashing"  type="password" name="Password" id="Password" placeholder="Enter Password"  pattern="^(?=.*\W).{8, }$">
                </p>
            </fieldset>
            <button class="button"  id="submit" type="submit"><p class="source-code">Log in</p></button>
            <button class="button" id="clear" ><p class="source-code">Clear</p></button>
        </form>
    </aside>
    <div class="felx-box">
        <a href="Blog.php" class="button" id="back" ><p class="source-code">Go Back</p></a>
        </div>
    <script src="js/blog-login.js"></script>
</body>
</html>
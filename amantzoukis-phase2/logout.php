<?php
session_start();

unset($_SESSION['user_email']);
unset($_SESSION['user_firstname']);
unset($_SESSION['user_lastname']);

session_destroy();

header("Location: Blog.php");

exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
</head>
<body>
    
</body>
</html>
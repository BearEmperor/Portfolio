<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "phase2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title']; 
    $blogPost = $_POST['post'];
    if(isset($_POST['post_submit'])){
        $sql = "INSERT INTO POSTS (title, blogPost, dt) VALUES ('$title', '$blogPost', NOW())"; 

        if ($conn->query($sql) === TRUE) {
            header("Location: Blog.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    elseif (isset($_POST['preview_submit'])) { 
        $_SESSION['preview_post'] = array('title' => $title, 'blogPost' => $blogPost);
        header("Location: Blog.php?");
        exit();
    }
}

$sessionTitle  = '';
$sessionText = '';
if(isset($_GET['edit_post'])) {
    if(isset($_SESSION['preview_post'])) {
        $sessionTitle = $_SESSION['preview_post']['title'];
        $sessionText = $_SESSION['preview_post']['blogPost'];
        unset($_SESSION['preview_post']);
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Post</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/addPost-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/addPost-Desktop.css" media="screen and (min-width:769px)">
</head>
<body>
    <aside>
        <form action="addPost.php" method="POST">
            <fieldset>
                <legend class="source-code">Add a new post</legend>
                <p class="source-code"><label for="title">Title</label></p>
                <input type="text" name="title" id="title" placeholder="Give a Title" value="<?php echo $sessionTitle; ?>">
                <p><label class="source-code" for="post" id="postlabel">Text</label></p>
                <textarea name="post" id="post" rows="16" cols="50" placeholder="Type your blogpost" ><?php echo $sessionText; ?></textarea>
            </fieldset>
            <button class="button" type="submit" id="submit"name="post_submit"><p class="source-code">Post</p></button>
            <button class="button" type="submit" id="preview" name="preview_submit"><p class="source-code">Preview</p></button>
            <button class="button" id="clear" ><p class="source-code">Clear</p></button>
        </form>
        <div class="felx-box">
        <a href="Blog.php" class="button" id="back" ><p class="source-code">Go Back</p></a>
        </div>
    </aside>
    <script src="js/addbloghandling.js"></script>
</body>
</html>
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
    if (isset($_POST['submit_post'])) {
        $title = $_SESSION['preview_post']['title'];
        $blogPost = $_SESSION['preview_post']['blogPost'];
        $sql = "INSERT INTO POSTS (title, blogPost, dt) VALUES ('$title', '$blogPost', NOW())";

        if ($conn->query($sql) === TRUE) {
            unset($_SESSION['preview_post']);
            header("Location: blog.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


$welcome_message = '';
if(isset($_SESSION['user_email'])) {
    $welcome_message = '<aside class="source-code" id="welcome"><p>Welcome, ' . $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname'] . '!</p></aside>';
}

$posts_displayed = '';
$sql = "SELECT * FROM POSTS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

  /*ChatGPT sorting algorithm */
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if (strtotime($posts[$j]['dt']) < strtotime($posts[$j + 1]['dt'])) {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j + 1];
                $posts[$j + 1] = $temp;
            }
        }
    }


    foreach ($posts as $row){
        $posts_displayed .= '<article>';
        $posts_displayed .= '<div class="blog-post">';
        $posts_displayed .= '<h1 class="pixelify-sans-title" id="blog-title">' . $row["title"] . '</h1>';
        $posts_displayed .= '<p class="source-code">' . $row["blogPost"] . '</p>';
        $posts_displayed .= '<p class="share-tech" id="blog-date">' . formatDate($row["dt"]) . '</p>'; 
        $posts_displayed .= '</div>';
        $posts_displayed .= '</article>';
    }
} else {
    $posts_displayed = "No blog posts found.";
}

function formatDate($datetime) {
    $date = new DateTime($datetime, new DateTimeZone('Europe/London'));
    $date->setTimezone(new DateTimeZone('UTC'));
    return $date->format('jS F Y H:i:s \U\T\C');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andreas Mantzoukis - Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/Rest-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/Rest-Desktop.css" media="screen and (min-width:769px)">

</head>
<body id="blogbgc">
    <div class="grid-container" >
        <header class="grid-item" id="header">
            <div class ="flex-container">
                <div id="element1">
                    <h1 class="pixelify-sans-title">&lt;Andreas Mantzoukis&sol;&gt;</h1>
                </div>
                <div id="element2">
                    <nav>
                        <ul class ="flex-container">
                            <div id="element3"><li><a href="index.php"><h2 class="share-tech">&lt;Home&sol;&gt;</h2></a></li></div>
                            <div id="element3"><li><a href="AboutMe.php"><h2 class="share-tech">&lt;About Me&sol;&gt;</h2></a></li></div>
                            <div id="element4"><li><a href="SkillsAndExperience.php"><h2 class="share-tech">&lt;Experience&sol;&gt;</h2></a></li></div>
                            <div id="element5"><li><a href="Blog.php"><h2 class="share-tech">&lt;Blog&sol;&gt;</h2></a></li></div>
                            <?php if(isset($_SESSION['user_email'])) { ?>
                            <div id="element6"><li><a href="logout.php"><h2 class="share-tech">&lt;Log out&sol;&gt;</h2></a></li></div>
                            <?php } else { ?>
                            <div id="element6"><li><a href="login.php"><h2 class="share-tech">&lt;Sign in&sol;&gt;</h2></a></li></div>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php echo $welcome_message; ?>
        </header>

        <article class="grid-item" id="content" >
        <label class="share-tech" for="month" id="dropdownlabel">Select Month:</label>
            <select name="month" id="month">
                <option class="share-tech" value="00">All</option>
                <option class="share-tech" value="01">January</option>
                <option class="share-tech" value="02">February</option>
                <option class="share-tech" value="03">March</option>
                <option class="share-tech" value="04">April</option>
                <option class="share-tech" value="05">May</option>
                <option class="share-tech" value="06">June</option>
                <option class="share-tech" value="07">July</option>
                <option class="share-tech" value="08">August</option>
                <option class="share-tech" value="09">September</option>
                <option class="share-tech" value="10">October</option>
                <option class="share-tech" value="11">November</option>
                <option class="share-tech" value="12">December</option>
            </select>
            <br><br>
            
            <section id="preview-section">
                <?php if (isset($_SESSION['preview_post'])) { ?>
                    <article>
                        <div class="review-blog-post">
                            <h1 class="pixelify-sans-title" id="blog-title">
                                <?php echo $_SESSION['preview_post']['title']; ?>
                            </h1><p class="source-code">
                                <?php echo $_SESSION['preview_post']['blogPost']; ?>
                            </p>
                        </div>
                    </article>
                <?php } ?>
            </section>
            
            <?php echo $posts_displayed; ?>
        </article>

        <?php if(isset($_SESSION['user_email'])) { ?>
            <article class="grid-item" id="addPostB">
                <aside>
                    <?php if (!isset($_SESSION['preview_post']) || !isset($_SESSION['preview_post']['title']) || !isset($_SESSION['preview_post']['blogPost'])) { ?>
                        <a href="addPost.php" class="button"><p class="source-code">Add a Post</p></a>
                        <?php } else { ?>
                            <section class ="flex-container">
                                <div id="b1">
                                    <form action="blog.php" method="POST">
                                        <button class="button" type="submit" name="submit_post"><p class="source-code">Submit</p></button>
                                    </form>
                                </div>
                                <div id="b2">
                                    <form action="addPost.php" method="GET">
                                        <input type="hidden" value="true" name="edit_post">
                                        <button class="button" type="submit"><p class="source-code">Edit</p></button>
                                    </form>
                                </div>
                            </section>
                    <?php } ?>
                </aside>
            </article>
        <?php } ?>
        
        <footer class="grid-item" id="footer">
            <h3 class="pixelify-sans-title"> Andreas Mantzoukis 2024 &copy;</h3>
        </footer>
    </div>
<script src="js/blog.js"></script>
</body>
</html>
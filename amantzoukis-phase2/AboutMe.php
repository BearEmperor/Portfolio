<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andreas Mantzoukis - About Me</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/Rest-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/Rest-Desktop.css" media="screen and (min-width:769px)">

</head>
<body>
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
                            </ul>
                        </nav>
                    </div>
            </div>
            <?php if(isset($_SESSION['user_email'])) { ?>
            <aside class="source-code" id="welcome">
                <p>Welcome, <?php echo $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname']; ?>!</p>
            </aside>
            <?php } ?>
        </header>

        <article class="grid-item" id="content">
            <div class="flex-container">
                <div id="element7">
                    <figure><img src="./img/andreas.jpg" alt="A photo of Andreas Mantzoukis"></figure>
                </div>
                <section>
                    <div id="element8">
                        <p class="source-code">&sol;*Hello World! I am Andreas, an eager and enthusiastic Computer Science Student trying to master the study of Computation. My ultimate goal is for my code and creativity to positively impact my fellow people, and for that I am tirelessly trying to improve myself every day.*&sol;</p>
                    </div>
                </section>
        </article>

        <footer class="grid-item" id="footer">
            <h3 class="pixelify-sans-title"> Andreas Mantzoukis 2024 &copy;</h3>
        </footer>
    </div>
</body>
</html>
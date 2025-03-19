<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andreas Mantzoukis - SkillsAndExperience</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/Skills-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/Skills-Desktop.css" media="screen and (min-width:769px)">

</head>
<body>
    <div class="grid-container2">
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
            <figure>
                <img src="./img/skillgraph.png" alt="A graph showcasing my skills">
            </figure>
        </article>

        <article class="grid-item" id="content2">
            <h2 class="pixelify-sans-title">Education</h2>
            <div class="grid">
                <div class="education-dates" id="date1">
                    <div class="start-date"><p class="source-code">2017-</p></div>
                    <div class="end-date"><p class="source-code">2023</p></div>
                    <div class="start-date"><p class="source-code">2023-</p></div>
                    <div class="end-date"><p class="source-code">today</p></div>
                </div>
                <div class="education-content" id="ed1">
                    <p class="source-code">7th through 12th grade - German School of Athens</p>
                </div>
                <div class="education-content" id="ed2">
                    <p class="source-code">Computer Science Queen Mary University Of London</p>
                </div>
            </div>
        </article>

        <article class="grid-item" id="content3">
            <h2 class="pixelify-sans-title">Work Experience</h2>

            <p class="source-code">&sol;*As part of my high school curriculum, I had the opportunity to work as an intern for Desquared, an application development company situated in Greece. There I had the opportunity to learn how web and mobile applications are developed and how they are maintained. I also had the opportunity to work with the team and learn how to work in a team environment and how a proper workflow is maintained.*&sol;</p>
        </article>

        <footer class="grid-item" id="footer">
            <h3 class="pixelify-sans-title"> Andreas Mantzoukis 2024 &copy;</h3>
        </footer>
    </div>
</body>
</html>
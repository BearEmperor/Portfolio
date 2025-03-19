<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andreas Mantzoukis Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Share+Tech+Mono&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/Index-Mobile.css" media="screen and (max-width:768px)">
    <link rel="stylesheet" href="./css/Index-Desktop.css" media="screen and (min-width:769px)">

</head>
<body>
    <div class="grid-container" id="header">
        <header class="grid-item">
            <div class="flex-container">
                <div id="element1">
                    <figure>
                        <img src="./img/cmd.png" alt="A pixel art version of a command prompt">
                    </figure>
                    <h1 class="pixelify-sans-title">&lt;Andreas Mantzoukis&sol;&gt;</h1>
                   
                </div>

                <div id="element2">
                    <aside>
                        <a href="https://www.instagram.com/andreas_mantzoukis/"><figure class="icon"><img src="./img/instagram.png" alt="The icon of Instagram"></figure></a>
                        <a href="https://github.com/BearEmperor"><figure class="icon"><img src="./img/github.png" alt="The icon of GitHub"></figure></a>
                        <a href="https://www.linkedin.com/in/andreas-mantzoukis-a0689627a/"><figure class="icon"><img src="./img/linkedin.png" alt="The icon of Linked In"></figure></a>
                        <a href="https://wa.me/447392762677"><figure class="icon"><img src="./img/whatsapp.png" alt="the icon of What's App"></figure></a>
                    </aside>
                </div>
            </div>
        </header>

        <article class="grid-item" id="aboutme">
            <div class="hovereffect">
                <a href="AboutMe.php"><h2 class="pixelify-sans-title">&lt;About Me&sol;&gt;</h2></a>
                <p class="source-code">&sol;*Learn some information about me, my motivations, education etc.*&sol;</p>
            </div>
            </article>

        <article class="grid-item" id="skills">
            <div class="hovereffect">
                <a href="SkillsAndExperience.php"><h2 class="pixelify-sans-title">&lt;Skills And Experience&sol;&gt;</h2></a>
                <p class="source-code">&sol;*Discover my areas of expertise, qualifications and projects*&sol;</p>
            </div>
            </article>

        <article class="grid-item" id="blog">
            <div class="hovereffect">
                <a href="Blog.php"><h2 class="pixelify-sans-title">&lt;Blog&sol;&gt;</h2></a>
                <p class="source-code">&sol;*Take a look at my personal Blog about relevant developments in the tech-industry*&sol;</p>
            </div>
        </article>

        <footer class="grid-item" id="footer">
            <h3 class="pixelify-sans-title"> Andreas Mantzoukis 2024 &copy;</h3>
        </footer>
    </div>
</body>
</html>
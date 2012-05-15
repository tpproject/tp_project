﻿<?php
if (isset($_SESSION['authuser'])) {
     $sidebar=1; 
}
?>
<!doctype html>  
<html>  
<head>  
    <title>Картинки</title>  
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
</head>
	<body>
	<header>  
        	<h1>Gaming Zone</h1>  
    </header> 
   	<nav>  
        <ul>  
            <li><a href="index.php">Начало</a></li>  
    		<li>
            <?php 
				if($sidebar==1)
					echo '<a href="logout.php">Излез</a>';
				else
					echo '<a href="reg.html">Регистрация</a>';
			?>
            </li> 
            <li><a href="gallery.php">Картинки</a></li>    
            <li><a href="luck.php">Късметчета</a></li>  
			
        </ul>     
    </nav></p></p>
	<div id="content">
    	<div id="mainContent">
            <div class='img'>
            <img src='images/1280x1024.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/alan_wake_44545-1280x1024.jpg' width="200" height="200" />
            </div>

            <div class='img'>
            <img src='images/ACB_1280x1024.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/Uplay_PC_Wallpaper4_1280x960.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/Uplay_PC_Wallpaper3_1280x960.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/Uplay_PC_Wallpaper2_1280x960.jpg' width="200" height="200" />
            </div>

            <div class='img'>
            <img src='images/133210_1280_1024.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/12894207045.jpg' width="200" height="200" />
            </div>
            
            <div class='img'>
            <img src='images/batman.bmp' width="200" height="200" />
            </div>

            <div class='img'>
            <img src='images/prince of persia 2.jpg' width="200" height="200" />
            </div>

            <div class='img'>
            <img src='images/Wallpaper_Prince_of_Persia_The_Two_Thrones_06.jpg' width="200" height="200" />
            </div>

            <div class='img'>
            <img src='images/prince of persia 2 warrior within.jpg' width="200" height="200" />
            </div> 
            
    	</div>
	</div>
    <footer>
        <div>
            <section id="about">
                <header>
                    <h3>За сайта</h3>
                </header>
                <p>Сайта е разработен за проект по ТП през учебната 2011/2012 от ученици на 11б клас на ТУЕС.</p>
            </section>
            <section id="blogroll">
                <header>
                    <h3>Последвай ни</h3>
                </header>
                <ul>
                    <li><a href="www.facebook.com">Facebook</a></li>
                </ul>
            </section>
            <section id="popular">
                <header>
                    <h3>Популярни</h3>
                </header>
                <ul>
                    <li><a href="luck.php">Изтегли Късметче</a></li>
                </ul>
            </section>
        </div>
    </footer>
  
</body>  
</html> 

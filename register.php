<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Congratulations!</title>
</head>
<body><!doctype html>  
<html>  
<head>  
    <title>Регистрация</title>  
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
</head>

<body>

	<header>  
        <h1>Gaming Zone</h1>  
    </header>  

    <nav>  
        <ul>  
            <li><a href="index.html">Начало</a></li>  
            <li><a href="reg.html">Регистрация</a></li> 
            <li><a href="gallery.php">Картинки</a></li>    
            <li><a href="luck.php">Късметчета</a></li>  
			
        </ul>     
    </nav>
    <div id="content">
    	<div id="mainContent">
    	
		<?php
		mysql_connect("localhost","root","wweraw") or die("Check your connection!");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
  		mysql_select_db("register");
  		mysql_query("INSERT INTO users (Username, Password, Email)
 		VALUES ('$username', '$password','$email')");
		
  		echo "Registration Completed!";
  		mysql_close();
		?>
    	</div>
        <div id="sidebar">
        
        
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
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Tweeter</a></li>
                </ul>
            </section>
            <section id="popular">
                <header>
                    <h3>Популярни</h3>
                </header>
                <ul>
                    <li><a href="#">Куизи</a></li>
                    <li><a href="#">Изтегли Късметче</a></li>
                </ul>
            </section>
        </div>
    </footer>

</body>
</html>
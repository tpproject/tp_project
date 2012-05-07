<?php
	require("login.php");
	session_start();
	if($_SESSION['authuser']==1)
		header('Location: http://localhost/tpproject/authenticate.php');
?>
<!doctype html>  
<html>  
<head>  
    <title>Gaming Zone</title>  
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">

	
	<script src="js/game.js"></script>

</head>  
<body>  
    <header>  
        <h1>Gaming Zone</h1>  
    </header>  
    <nav>  
        <ul>  
            <li><a href="index.php">Начало</a></li>  
    		<li><a href="reg.html">Регистрация</a></li> 
            <li><a href="gallery.php">Картинки</a></li>    
            <li><a href="luck.php">Късметчета</a></li>  
			
        </ul>     
    </nav>  
     
    <div id="content">
    	<div id="mainContent">
        	<br>
        	<img src="images/steps.jpg">
        </div>
        <div id="sidebar">
        	<br><br>
        	<form action="authenticate.php" method="POST">
				<table class="tableborder" align=center bgcolor="#f0f0f2">
   				<tr>
                	<td style="padding-bottom: 10px;" colspan="2" class="heading1"><b>Login Required</b></td>
                </tr>
                <tr>
                  <td height="30">Име:</td>
                  <td><input type="text" name="Username" style="width:15em;">
                  </td>
                </tr>
                <tr>
                  <td height="30">Парола:</td>
                  <td><input type="password" name="Password" style="width:15em;">
                  </td>
                </tr>
                <tr>
                <td><input name="submit" type="submit" value="Влез" class="submit"></td></tr>
       				
  				</table>
			</form>
            <?php
            	if($_COOKIE['massage']==1){
                	echo '<b>';
					echo '&nbsp &nbsp';
					echo "Невалиден логин! Моля опитайте отново. " ;
					echo '</b>';
				}
						
            ?>
            <br><hr width="100%">
        	<h3>
            	<center>Класация</center>
            </h3>
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

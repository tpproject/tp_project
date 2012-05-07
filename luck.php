<?php
	session_start();
	require("login.php");
	if (isset($_SESSION['authuser'])) {
		$authuser = 1;
	}
?>
<!doctype html>  
<html>  
<head>  
    <title>Gaming Zone</title>  
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
    <script src="js/luck.js"></script>
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
				if($authuser==1)
					echo '<a href="logout.php">Излез</a>';
				else
					echo '<a href="reg.html">Регистрация</a>';
			?>
            </li> 
            <li><a href="gallery.php">Картинки</a></li>    
            <li><a href="luck.php">Късметчета</a></li>  
			
        </ul>     
    </nav>  
    <div id="content">
        <div id="mainContent">  
<?php
	if($authuser!=1){
		echo '<br> <br> <br>';
		echo '<b>';
		echo "За да видите тази страница трябва да влезете с акаунта си!";
		echo ' <form action="authenticate.php" method="POST">
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
			</form>';	
		
	}else
		echo '
            <img src="images/luck.jpeg">
             <div id="box">
             	<center>
                	<h3>Късметът ти днес:</h3>
                    <p id="phrase"></p>
                      <form>
                <input type="button" id="luckButton" value="Изтегли">
            </form> 
                </center>
                </div>   
          ';
?>
    	</div>
        <div id="sidebar">
        	<br><br>
        	<?php
				if ($authuser == 1){
					echo '<center>';
					echo "Здравей, ". $_SESSION['username'] . " ";
					echo '<br>';
					echo '<a href = logout.php>Излез</a>';
					echo '</center>';
				}
			?>
            <br>
            <hr width="100%">
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

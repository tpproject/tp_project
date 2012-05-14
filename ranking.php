<?php
session_start();
	require("login.php");
if (isset($_SESSION['authuser'])) {
     $sidebar=1;     
}else if($massage!=1){
		header('Location: http://localhost/TP/index.php');
		setcookie('massage',1,time()+1);
	}
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
    </nav>  
   
    <div id="content">
    	<div id="mainContent">

        </div>
        <div id="sidebar">
        <br><br>
		<?php
			if ($sidebar ==1){
				echo '<center>';
				echo "Здравей, ". $_SESSION['Username'] ." ";
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
<?php
	$link = mysql_connect("localhost","root","wweraw") or die("Check your connection!");
	mysql_select_db("register");
	
	$query="SELECT Username,Points FROM users ORDER BY Points";
	$result = mysql_query($query,$link) or die(mysql_error());
	
	$user_header=<<<EO
	<table width="70%" border = "1" cellpadding = "2" cellspacing="2" align="center">
	<tr>
		<th>Username</th>
		<th>Points</th>
	</tr>
EO;

	$user_details= ' ';
	$counter = 0;
	while ($counter < 10) {
		$row = mysql_fetch_array($result);
		$user = $row['Username'];
		$points = $row['Points'];
		
		$user_details .=<<<EOD
		<tr>
			<td><center>$user</center></td>
			<td><center>$points</center></td>
		</tr>
EOD;
	$counter = $counter + 1 ;
	}

	$user_footer="</table>";
	
	$users =<<<USERS
		$user_header
		$user_details
		$user_footer
USERS;
	echo $users;
?>
            
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
                    <li><a href="http://www.facebook.com">Facebook</a></li>
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

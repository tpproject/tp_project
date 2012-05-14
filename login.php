<?php 
	
	mysql_connect("localhost","root","wweraw") or die("Check your connection!");
				
	mysql_select_db("register");
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	session_start();
	if(!isset($_SESSION['Username']))
		$_SESSION['Username'] = $Username;
	mysql_query("SELECT Username FROM users WHERE Username='". $Username ."' AND Password='". 	$Password ."'"); 
	if(mysql_affected_rows()>0){
		$_SESSION['authuser']=1;
	}
?>
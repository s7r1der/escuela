<?php
	$host="localhost";	//Definicion parametros
	$DBname="rieles";
	
	$conn=new mysqli($host,"root","glittering",$DBname);
	
	mysqli_connect($conn);	//$conn=mysql_connect($host, "root","glittering");// or	header("Location:".$_SERVER["PHP_SELF"]."?event=logout");
	
	//mysql_select_db($DBname) or die (mysql_error());
?>

<?php

$conn=newConnect();

$res=mysqli_query($conn,"select * from usuario"
					." WHERE usr_pswd = '".$_POST["passwd"]."'"
					." AND usr_name ='".$_POST["usr"]."'")or die(mysqli_error($conn));

if($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){

	$_SESSION["user"]=$_POST["usr"];				//Asign user name or logname.
	$_SESSION["usr_pswd"]=$_POST["passwd"];			//Asign passwd.

	$_SESSION["usr_role"]=	$row["usr_role"];	//Determine role and level, and mat  for operations and permissions.
	$_SESSION["usr_level"]=	$row["usr_level"];
	$_SESSION["usr_mat"]=	$row["usr_mat"];
	$_SESSION["usr_id"]=	$row["usr_id"];
	$_SESSION["usr_class"]=	$row["usr_class"];

	header("Location:".$_SERVER["PHP_SELF"]."?event=menu_user");	//Redirect to Ppal Menu.
}else{
	header("Location:".$_SERVER["PHP_SELF"]."?event=logout");		//Redirect to Login for invalid login.
}
?>

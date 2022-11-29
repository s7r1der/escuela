<?php
if($table=="add"){

	$usrid="";

	$_POST["usr_fcolor"]=($_POST["usr_fcolor"]=="blanco"?"#FFFFFF":"#000000");

	mysql_query("INSERT INTO usuario (usr_name,usr_pswd,usr_role,usr_color,usr_fcolor) values ("
			."'".$_POST["usr_name"]."',"
			."'".$_POST["usr_pswd"]."',"
			."'".$_POST["usr_role"]."',"
			."'".(($_POST["usr_role"]=="prof" && ($_POST["usr_color"]!=""))?$_POST["usr_color"]:"")."',"
			."'".(($_POST["usr_role"]=="prof" && ($_POST["usr_fcolor"]!=""))?$_POST["usr_fcolor"]:"")."')")or die(mysql_error());

	$res=mysql_query("SELECT usr_id FROM usuario where usr_name='".$_POST["usr_name"]."' and usr_pswd='".$_POST["usr_pswd"]."'");
	while($rw=mysql_fetch_array($res,MYSQL_ASSOC)){
		$usrid=$rw["usr_id"];
	}

	if($_POST["usr_role"]=="papa"){

		$j=0;

		for($i=1;$i<8;$i++){
			echo $_POST["curso".$i]."<br>";
			if($_POST["curso".$i]!=""){
				$class[$j]=$_POST["curso".$i];
				$j++;
			}
		}

		foreach ($class as $valor) {
			mysql_query("INSERT INTO padre (usr_id,padre_class) values ("
				."'".$usrid."',"
				."'".$valor."')")or die(mysql_error());
		}
	}elseif($_POST["usr_role"]=="prof"){
		$j=0;

		for($i=1;$i<8;$i++){
			echo $_POST["curso".$i]."<br>";
			if($_POST["curso".$i]!=""){
				$class[$j]=$_POST["curso".$i];
				$j++;
			}
		}

		foreach ($class as $valor) {
			mysql_query("INSERT INTO profesor (usr_id,prof_class) values ("
				."'".$usrid."',"
				."'".$valor."')")or die(mysql_error());
		}
	}


}elseif($table=="upd"){

	$fec=explode("/",$_POST["fecha"]);

	mysql_query("update news"
				." SET "
					."news_desc='".$_POST["news_desc"]."',"
					."news_class='".$_POST["news_class"]."',"
					."news_date='".$fec[2]."-".$fec[1]."-".$fec[0]."',"
					."usr_id='".$_SESSION["usr_id"]."',"				
					."date_sys='".date("Y-m-d H:i:s")."' where news_id='".$_POST["news_id"]."'")or die(mysql_error());

}elseif($table=="del"){

	mysql_query("DELETE FROM news where news_id='".$_POST["news_id"]."'")or die(mysql_error());
}

?>


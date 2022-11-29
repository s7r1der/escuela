<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">

<table width=90% align=center class=myTable-gray>
	<!-- <tr><td class=titulo colspan=2>RIELES ARGENTINOS<br><font size=3>MENU PRINCIPAL</font></font></td></tr>
	event=upddni  -->
	<tr><td class=titulo colspan=2><font size=3>MENU PRINCIPAL</font></font></td></tr>
	
	<tr><td align=left class=titulo><font size=3>@<?php echo $_SESSION["user"];?> (PADRES)</font></td></tr>
	<tr><td align=left><i><b>* 29 y 30 de Marzo</b> - Semana Santa</i></td></tr>
	<tr><td align=left><i><b>* 2 de Abril</b> - Dia del Veterano y de los Caídos en la Guerra de Malvinas.</i></td></tr>
	<tr><td><hR></td></tr>
	<tr><td align=left class=link><a href="<?php echo $_SERVER["PHP_SELF"]."?event=show_news";?>" class=link>VER NOTICIAS.</a></td></tr>
	<tr><td align=left class=link><a href="<?php echo $_SERVER["PHP_SELF"]."?event=show_exam";?>" class=link>VER PRUEBAS.</a></td></tr>
  	<tr><td align=left class=link><a href="<?php echo $_SERVER["PHP_SELF"]."?event=logout";?>" class=link>SALIR.</a></td></tr>

</table>

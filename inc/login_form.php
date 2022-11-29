<link rel="StyleSheet" href="css/login_form.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">


<FORM action=<?php echo $_SERVER["PHP_SELF"];?> method="POST">


<table align=center height=20% class=myTable-gray>
	<tr valign=center><td class=titulo colspan=2>RIELES ARGENTINOS<br>QUINTO GRADO "C"<td></tr>	
	
	<tr valign=bottom>	<td align=center><b>USUARIO:</b></td></tr>	
	<tr>				<td align=center><input type=text class=Fields size=20 name=usr id=usr_id></td></tr>
	<tr>				<td align=center><b>CONTRASEÑA:</b></td></tr>
	<tr>					<td align=center><input type=password class=Fields size=20 name=passwd></td></tr>

	<tr valign=top><td align=center colspan=2><input type=submit class=boton id=butt_log name="event" value="Acceder"><td></tr>	
</table>

</FORM>
	
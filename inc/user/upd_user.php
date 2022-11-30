<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">

<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">

	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>CREAR USUARIO</b></td>
		</tr>

		<tr>
			<td align=center colspan=3>
				<table width=95%>
					<tr>
						<td class=subtitulo colspan=2><b><?php echo $_SESSION["user"]; ?></b></td>
					</tr>

					<tr>
						<td align=center colspan=2>
							<hr>
						</td>
					</tr>

					<tr>
						<td align=left><B>NOMBRE: </B><input type="text" name="usr_name" size="12" />
					<tr>
						<td align=left><B>CONSTRASENA: </B><input type="text" name="usr_pswd" size="12" />
					<tr>
						<td><b>ROL</b>
							<select name=usr_role class=Fields>
								<option selected>papa</option>
								<option>prof</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align=left><B>COLOR: </B><input type="text" name="usr_color" size="12" />
					<tr>
						<td><b>LETRA: </b>
							<select name=usr_fcolor class=Fields>
								<option selected>blanco</option>
								<option>negro</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan=2 align=left><B>CLASE 1: </B> <input type="text" name="curso1" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 2: </B> <input type="text" name="curso2" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 3: </B> <input type="text" name="curso3" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 4: </B> <input type="text" name="curso4" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 5: </B> <input type="text" name="curso5" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 6: </B> <input type="text" name="curso6" size="12" />
					<tr>
						<td colspan=2 align=left><B>CLASE 7: </B> <input type="text" name="curso7" size="12" />

				</table>

			</td>
		</tr>

		<tr>
			<td align=center colspan=3>
				<hr>
			</td>
		</tr>

		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="Agregar Usuario">
			<td>
		</tr>

	</table>

</FORM>
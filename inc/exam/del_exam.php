<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">


<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">


	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>BORRAR PRUEBA</b></td>
		</tr>

		<tr>
			<td align=center colspan=3>
				<hr>
			</td>
		</tr>

		<tr>
			<td align=center colspan=3>
				<table width=95% border=1 bgcolor="WHITE">
					<tr>
						<td class=subtitulo><b><?php echo $_SESSION["user"]; ?></b></td>
					</tr>

					<?php
					echo "<input type=hidden name=exam_id value='" . $_GET["exam_id"] . "'>";

					$conn = newConnect();
					$res = mysqli_query($conn, "SELECT date_format(exam_date,\"%d/%m/%Y\") as fecha,exam_desc FROM exam where exam_id='" . $_GET["exam_id"] . "'") or die(mysqli_error($conn));

					while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
						echo "<tr><td align=left><B>FECHA PRUEBA: </B>" . $row["fecha"] . "</td></tr>";
						echo "<tr><td align=left>" . $row["exam_desc"] . "</td></tr>";
					}
					?>
				</table>
			</td>
		</tr>
		<tr>
			<td align=center colspan=3>
				<hr>
			</td>
		</tr>

		<tr valign=top>
			<td align=center class=subtitulo colspan=3>ESTA SEGURO QUE DESEA BORRAR?
			<td>
		</tr>
		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="BORRAR PRUEBA">
			<td>
		</tr>
		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="NO">
			<td>
		</tr>

	</table>

</FORM>
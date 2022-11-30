<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">


<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">


	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>BORRAR NOTICIAS</b></td>
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
					$conn = newConnect();

					echo "<input type=hidden name=news_id value='" . $_GET["news_id"] . "'>";

					$res = mysqli_query($conn, "SELECT date_format(news_date,\"%d/%m/%Y\") as fecha,news_desc FROM news where news_id='" . $_GET["news_id"] . "'") or die(mysqli_error($conn));

					while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
						echo "<tr><td align=left><B>FECHA NOTICIA: </B>" . $row["fecha"] . "</td></tr>";
						echo "<tr><td align=left>" . $row["news_desc"] . "</td></tr>";
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
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="BORRAR NOTICIA">
			<td>
		</tr>
		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="NO">
			<td>
		</tr>

	</table>

</FORM>
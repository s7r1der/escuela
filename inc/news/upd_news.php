<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">


<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">


	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>MODIFICAR NOTICIAS</b></td>
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
					echo "<input type=hidden name=news_id value='" . $_GET["news_id"] . "'>";

					$conn = newConnect();
					$res = mysqli_query($conn, "SELECT date_format(news_date,\"%d/%m/%Y\") as fecha,news_desc,"
						. "news_class FROM news where news_id='" . $_GET["news_id"] . "'") or die(mysqli_error($conn));

					while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

						echo "<tr><td align=center colspan=3><hr></td></tr>";

						echo "<tr><td align=left><B>NOTICIA PARA : </B>";
						echo "<select name=news_class class=Fields>";
						$rs = mysqli_query($conn, "SELECT prof_class from profesor where usr_id='" . $_SESSION["usr_id"] . "'") or die(mysqli_error($conn));
						while ($rw = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
							echo "<option>" . $rw["prof_class"] . "</option>";
						}
						echo "<option selected>" . $row["news_class"];
						echo "</select>";
						echo "</td></tr>";

						echo "<tr><td align=center colspan=3><hr></td></tr>";

						echo "<tr><td align=left><B>FECHA NOTICIA: </B>";
						echo "<input type=\"text\" name=\"fecha\" id=\"datepicker\" size=\"12\" value=" . $row["fecha"] . "></td></tr>";

						echo "<tr><td align=center colspan=3><hr></td></tr>";

						echo "<tr><td align=left>NOTICIA<br><textarea rows=5 cols=40 name=news_desc>" . $row["news_desc"] . "</textarea></td></tr>";
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
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="Guardar Noticia">
			<td>
		</tr>

	</table>

</FORM>
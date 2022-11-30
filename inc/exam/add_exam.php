<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">

<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">

	<table align=center width=80% class=myTable-gray border=3>
		<tr valign=center>
			<td class=titulo colspan=3>CREAR PRUEBA</b></td>
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

					<tr>
						<td align=center colspan=3>
							<hr>
						</td>
					</tr>

					<tr>
						<td align=left><B>PRUEBA PARA : </B>
							<select name=exam_class class=Fields>
								<option selected>5to C</option>
								<option>5to D</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>
							<hr>
						</td>
					</tr>
					<tr valign=middle>
						<td align=left><B>FECHA PRUEBA: </B>
							<input type="text" name="exam_date" id="datepicker" readonly="readonly" size="12" />
						</td>
					</tr>

					<tr>
						<td>
							<hr>
						</td>
					</tr>

					<tr>
						<td align=left><B>MATERIA: </B>
							<select name=exam_assign>
								<?php
								$conn = newConnect();
								$res = mysqli_query($conn, "SELECT mat_name from materia where 1 order by mat_name") or die(mysqli_error($conn));
								while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
									echo "<option>" . $row["mat_name"] . "</option>";
								}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td>
							<hr>
						</td>
					</tr>
					<tr>
						<td align=left>TEMAS DE LA PRUEBA<br><textarea rows=5 cols=40 name=exam_desc></textarea></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td align=center colspan=3>
				<hr>
			</td>
		</tr>

		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="Prueba">
			<td>
		</tr>

	</table>

</FORM>
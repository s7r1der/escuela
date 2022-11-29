<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">


<FORM action=<?php echo $_SERVER["PHP_SELF"];?> method="POST">


<table align=center width=80% class=myTable-gray>
	<tr valign=center><td class=titulo colspan=3>MODIFICAR NOTICIAS de 4to GRADO "C"</b></td></tr>	

	<tr><td align=center colspan=3><hr></td></tr>	

	<tr><td align=center colspan=3>
		<table width=95% border=1 bgcolor="WHITE">
			<tr>
				<td class=subtitulo><b><?php echo $_SESSION["user"];?></b></td>
			</tr>	

			<?php
				$conn=newConnect();

				echo "<input type=hidden name=exam_id value='".$_GET["exam_id"]."'>";

				$res=mysqli_query($conn,"SELECT date_format(exam_date,\"%d/%m/%Y\") as fecha"
								.",exam_class,exam_desc,exam_assign FROM exam where exam_id='".$_GET["exam_id"]."'")or die(mysqli_error($conn));
			
				while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
					echo "<tr><td><hr></td></tr>";
					
					echo "<tr><td align=left><B>PRUEBA PARA: </B>";
						echo "<select name=exam_class>";
							echo "<option>5to C</option>";
							echo "<option>5to D</option>";
							echo "<option selected>".$row["exam_class"]."</option>"; 	       		
						echo "</select>";
					echo "</td></tr>";

					echo "<tr><td><hr></td></tr>";
					echo "<tr><td align=left><B>FECHA PRUEBA: </B>"; 	       		
						echo "<input type=\"text\" name=\"fecha\" id=\"datepicker\" size=\"12\" value=".$row["fecha"]."></td></tr>";
					
					echo "<tr><td><hr></td></tr>";
					
					echo "<tr><td align=left><B>MATERIA: </B>";
						
						echo "<select name=exam_assign>";
							
						$res1=mysqli_query($conn,"SELECT mat_name from materia where 1 order by mat_name") or die(mysqli_error($conn));
						while($row1=mysqli_fetch_array($res1,MYSQLI_ASSOC)){
							echo "<option>".$row1["mat_name"]."</option>";
						}
							echo "<option selected>".$row["exam_assign"]."</option>";
						echo "</select>";
					echo "</td></tr>";

					echo "<tr><td><hr></td></tr>";
		
					echo "<tr><td align=left><textarea rows=5 cols=40 name=exam_desc>".$row["exam_desc"]."</textarea></td></tr>";
				}
			?>
		</table>
	</td></tr>
	<tr><td align=center colspan=3><hr></td></tr>	

	<tr valign=top><td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="Guardar Prueba"><td></tr>	

</table>

</FORM>
	
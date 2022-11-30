<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">
<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">


	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>PRUEBAS DE ALUMNOS</b></td>
		</tr>

		<?php
		$conn = newConnect();
		$cond = "";

		if ($_SESSION["usr_role"] == "prof") {
			$rw1 = mysqli_query($conn, "SELECT prof_class from profesor where usr_id='" . $_SESSION["usr_id"] . "'") or die(mysqli_error($conn));
			while ($rq = mysqli_fetch_array($rw1, MYSQLI_ASSOC)) {
				if ($cond == "") $cond = " WHERE exam_class='" . $rq["prof_class"] . "'";
				else $cond = $cond . " OR exam_class='" . $rq["prof_class"] . "'";
			}
		} elseif ($_SESSION["usr_role"] == "papa") {
			$rw1 = mysqli_query($conn, "SELECT padre_class from padre where usr_id='" . $_SESSION["usr_id"] . "'") or die(mysqli_error());
			while ($rq = mysqli_fetch_array($rw1, MYSQLI_ASSOC)) {
				if ($cond == "") $cond = " WHERE exam_class='" . $rq["padre_class"] . "'";
				else $cond = $cond . " OR exam_class='" . $rq["padre_class"] . "'";
			}
		}

		$res = mysqli_query($conn, "SELECT ex.exam_id,date_format(ex.exam_date,\"%d/%m\") as fecha,ex.exam_assign,ex.exam_desc,ex.usr_id,mat.mat_name"
			. ",mat.mat_color,mat.mat_fcolor,ex.exam_class"
			. " FROM exam ex left join materia mat"
			. " ON ex.exam_assign=mat.mat_name " . $cond . " order by ex.exam_date desc") or die(mysqli_error($conn));

		while ($rw = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

			$name = ($_SESSION["usr_role"] == 'prof' ? "prof " : "") . strtoupper($rw["usr_name"]);;

			echo "<tr><td align=center colspan=3>";
			echo "<table width=95% border=1 bgcolor=\"WHITE\">";
			echo "<tr>";
			echo "<td bgcolor=#" . $rw["mat_color"] . " align=center colspan=1><font color=" . $rw["mat_fcolor"] . "><b>" . $rw["exam_assign"] . "</b></font></td>";
			echo "<td bgcolor=#" . $rw["mat_color"] . " align=center colspan=1><font color=" . $rw["mat_fcolor"] . "><b>" . $rw["exam_class"] . "</b></font></td>";
			echo "</tr>";

			if ($_SESSION["usr_role"] == "prof" && $_SESSION["usr_id"] == $rw["usr_id"]) {
				echo "<tr>";
				echo "<td bgcolor=#" . $rw["mat_color"] . " align=center colspan=1>";
				echo "<a href=" . $_SERVER["PHP_SELF"] . "?event=nh_upd_exam"
					. "&exam_id=" . $rw["exam_id"]
					. " class=CirButton title=Modificar><font color=" . $rw["mat_fcolor"] . "><b>MODIFICAR</b></font></a></td>";
				echo "<td bgcolor=#" . $rw["mat_color"] . " align=center colspan=1>";
				echo "<a href=" . $_SERVER["PHP_SELF"] . "?event=del_exam"
					. "&exam_id=" . $rw["exam_id"]
					. " class=CirButton title=Modificar><font color=" . $rw["mat_fcolor"] . "><b>BORRAR</b></font></a></td>";
				echo "</tr>";
			}

			echo "<tr><td align=left  colspan=2><b>" . $rw["fecha"] . " - </b>" . $rw["exam_desc"] . "</td></tr>";
			echo "</table>";
			echo "</td></tr>";
			echo "<tr><td align=center colspan=3><hr></td></tr>";
		}

		?>

		<tr>
			<td align=center colspan=3>
				<hr>
			</td>
		</tr>

		<tr valign=top>
			<td align=center colspan=3><input type=submit class=boton id=butt_log name="event" value="VOLVER">
			<td>
		</tr>
	</table>

</FORM>
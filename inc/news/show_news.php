<link rel="StyleSheet" href="css/forms.css" type="text/css">
<meta name=viewport content="width=device-width, initial-scale=1">
<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">


	<table align=center width=80% class=myTable-gray>
		<tr valign=center>
			<td class=titulo colspan=3>NOTICIAS PARA LOS PAPAS</b></td>
		</tr>

		<?php
		$conn = newConnect();

		$cond = "";

		if ($_SESSION["usr_role"] == "prof") {
			$rw1 = mysqli_query($conn, "SELECT prof_class from profesor where usr_id='" . $_SESSION["usr_id"] . "'") or die(mysqli_error($conn));
			while ($rq = mysqli_fetch_array($rw1, MYSQLI_ASSOC)) {
				if ($cond == "") $cond = " WHERE news_class='" . $rq["prof_class"] . "'";
				else $cond = $cond . " OR news_class='" . $rq["prof_class"] . "'";
			}
		} elseif ($_SESSION["usr_role"] == "papa") {
			$rw1 = mysqli_query($conn, "SELECT padre_class from padre where usr_id='" . $_SESSION["usr_id"] . "'") or die(mysqli_error($conn));
			while ($rq = mysqli_fetch_array($rw1, MYSQLI_ASSOC)) {
				if ($cond == "") $cond = " WHERE news_class='" . $rq["padre_class"] . "'";
				else $cond = $cond . " OR news_class='" . $rq["padre_class"] . "'";
			}
		}

		$res = mysqli_query($conn, "SELECT nw.news_id,date_format(nw.news_date,\"%d/%m\") as fecha,nw.news_class,nw.news_desc,nw.usr_id,usr.usr_name,usr.usr_color,usr.usr_fcolor"
			. " FROM news nw left join usuario usr"
			. " ON nw.usr_id=usr.usr_id " . $cond . " order by nw.news_date desc") or die(mysqli_error($conn));

		while ($rw = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

			$name = ($_SESSION["usr_role"] == 'prof' ? "PROF " : "") . strtoupper($rw["usr_name"]);

			echo "<tr><td align=center colspan=3>";
			echo "<table width=95% border=1 bgcolor=\"WHITE\">";
			echo "<tr>";
			echo "<td bgcolor=" . $rw["usr_color"] . " align=center colspan=1 width=80%><font color=" . $rw["usr_fcolor"] . "><b>" . $name . "</b></font></td>";
			echo "<td bgcolor=" . $rw["usr_color"] . " align=center colspan=1><font color=" . $rw["usr_fcolor"] . "><b>" . $rw["news_class"] . "</b></font></td>";
			echo "</tr>";

			if ($_SESSION["usr_role"] == "prof" && $_SESSION["usr_id"] == $rw["usr_id"]) {
				echo "<tr>";
				echo "<td bgcolor=" . $rw["usr_color"] . " align=center colspan=1>";
				echo "<a href=" . $_SERVER["PHP_SELF"] . "?event=nh_upd_news"
					. "&news_id=" . $rw["news_id"]
					. " class=CirButton title=Modificar><font color=" . $rw["usr_fcolor"] . "><b>MODIFICAR</b></font></a></td>";
				echo "<td bgcolor=" . $rw["usr_color"] . " align=center colspan=1>";
				echo "<a href=" . $_SERVER["PHP_SELF"] . "?event=del_news"
					. "&news_id=" . $rw["news_id"]
					. " class=CirButton title=Modificar><font color=" . $rw["usr_fcolor"] . "><b>BORRAR</b></font></a></td>";
				echo "</tr>";
			}

			echo "<tr><td align=left  colspan=2><b>" . $rw["fecha"] . " - </b>" . $rw["news_desc"] . "</td></tr>";
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
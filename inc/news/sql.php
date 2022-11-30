<?php
if ($table == "add") {

	echo $_POST["fecha"];

	$fec = explode("/", $_POST["fecha"]);

	$conn = newConnect();
	mysqli_query($conn, "insert into news (news_desc,news_date,news_class,usr_id,date_sys)"
		. " values("
		. "'" . $_POST["news_desc"] . "',"
		. "'" . $fec[2] . "-" . $fec[1] . "-" . $fec[0] . "',"
		. "'" . $_POST["news_class"] . "',"
		. "'" . $_SESSION["usr_id"] . "',"
		. "'" . date("Y-m-d H:i:s") . "')") or die(mysqli_error($conns));
} elseif ($table == "upd") {

	$fec = explode("/", $_POST["fecha"]);

	$conn = newConnect();
	mysqli_query($conn, "update news"
		. " SET "
		. "news_desc='" . $_POST["news_desc"] . "',"
		. "news_class='" . $_POST["news_class"] . "',"
		. "news_date='" . $fec[2] . "-" . $fec[1] . "-" . $fec[0] . "',"
		. "usr_id='" . $_SESSION["usr_id"] . "',"
		. "date_sys='" . date("Y-m-d H:i:s") . "' where news_id='" . $_POST["news_id"] . "'") or die(mysqli_error($conn));
} elseif ($table == "del") {

	$conn = newConnect();
	mysqli_query($conn, "DELETE FROM news where news_id='" . $_POST["news_id"] . "'") or die(mysqli_error($conn));
}

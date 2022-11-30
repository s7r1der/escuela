<?php
if ($table == "add") {

	$fec = explode("/", $_POST["exam_date"]);

	$conn = newConnect();
	mysqli_query($conn, "insert into exam (exam_desc,exam_assign,exam_class,exam_date,usr_id,date_sys)"
		. " values("
		. "'" . $_POST["exam_desc"] . "',"
		. "'" . $_POST["exam_assign"] . "',"
		. "'" . $_POST["exam_class"] . "',"
		. "'" . $fec[2] . "-" . $fec[1] . "-" . $fec[0] . "',"
		. "'" . $_SESSION["usr_id"] . "',"
		. "'" . date("Y-m-d H:i:s") . "')") or die(mysqli_error($conn));
} elseif ($table == "upd") {

	$fec = explode("/", $_POST["fecha"]);

	$conn = newConnect();
	mysqli_query($conn, "update exam"
		. " SET "
		. "exam_desc='" . $_POST["exam_desc"] . "',"
		. "exam_assign='" . $_POST["exam_assign"] . "',"
		. "exam_class='" . $_POST["exam_class"] . "',"
		. "exam_date='" . $fec[2] . "-" . $fec[1] . "-" . $fec[0] . "',"
		. "usr_id='" . $_SESSION["usr_id"] . "',"
		. "date_sys='" . date("Y-m-d H:i:s") . "' where exam_id='" . $_POST["exam_id"] . "'") or die(mysqli_error($conn));
} elseif ($table == "del") {

	$conn = newConnect();
	mysqli_query($conn, "DELETE FROM exam where exam_id='" . $_POST["exam_id"] . "'") or die(mysql_error($conn));
}

 <?php
	if (isset($_GET["event"])) {
		if (substr($_GET["event"], 0, 3) != "nh_") {
			include("inc/header.php");
		}

		$_SESSION["pos"] = $_GET["event"];
		//GET-->
		switch ($_GET["event"]) {

				//GRAL. Functions
			case "menu_user":
				if ($_SESSION["usr_role"] == 'prof')	include("inc/menu_prof.php");
				elseif ($_SESSION["usr_role"] == 'admin')	include("inc/menu_admin.php");
				elseif ($_SESSION["usr_role"] == 'papa')	include("inc/menu_user.php");
				break;

			case "add_user":
				include("inc/user/add_user.php");
				break;

			case "show_user":
				include("inc/user/show_user.php");
				break;


			case "nh_add_news":
				include("inc/header1.php");
				include("inc/news/add_news.php");
				break;

			case "nh_upd_news":
				include("inc/header1.php");
				include("inc/news/upd_news.php");
				break;

			case "del_news":
				include("inc/news/del_news.php");
				break;

			case "show_news":
				include("inc/news/show_news.php");
				break;

			case "nh_add_exam":
				include("inc/header1.php");
				include("inc/exam/add_exam.php");
				break;

			case "nh_upd_exam":
				include("inc/header1.php");
				include("inc/exam/upd_exam.php");
				break;

			case "del_exam":
				include("inc/exam/del_exam.php");
				break;

			case "show_exam":
				include("inc/exam/show_exam.php");
				break;

			case "logout":
				if (session_id()) {
					//mysql_delete("log2","usr_mat='".$_SESSION["usr_mat"]."'");
					session_unset();
					session_destroy();
				}
				include("inc/login_form.php");
				//login_form();
				break;
		}
		if (substr($_GET["event"], 0, 3) != "nh_") include("inc/footer.php");



		//POST-->
	} elseif (isset($_POST["event"])) {
		//if($_POST["event"]<>"VerHC" && $_POST["event"]<>"VerDHC" 
		if (
			$_POST["event"] <> "VerDHC"
			&& $_POST["event"] <> "Materiales_OS" && $_POST["event"] <> "Resumen Domicilio"
		) include("inc/header.php");

		switch ($_POST["event"]) {

			case "VOLVER":
				header("Location:" . $_SERVER["PHP_SELF"] . "?event=menu_user");
				break;

			case "Agregar Usuario":

				$res = mysql_query("SELECT usr_name FROM usuario WHERE usr_name='" . $_POST["usr_name"] . "' and usr_pswd='" . $_POST["usr_pswd"] . "'") or die(mysql_error());

				if (mysql_num_rows($res)) {
					echo "<font size=6 color=white>YA EXISTE UN USUARIO CON ESTAS CARACTERISTICAS</font>";
				} else {
					$table = "add";
					include("inc/user/sql.php");
					header("Location:" . $_SERVER["PHP_SELF"] . "?event=menu_user");
				}
				break;



			case "Noticia":

				$table = "add";
				include("inc/news/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_news");
				break;

			case "Guardar Noticia":

				$table = "upd";
				include("inc/news/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_news");
				break;

			case "BORRAR NOTICIA":
				$table = "del";
				include("inc/news/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_news");
				break;

			case "NO":
				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_news");
				break;

			case "Prueba":

				$table = "add";
				include("inc/exam/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_exam");
				break;

			case "Guardar Prueba":

				$table = "upd";
				include("inc/exam/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_exam");
				break;

			case "BORRAR PRUEBA":
				$table = "del";
				include("inc/exam/sql.php");

				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_exam");
				break;

			case "NO.":
				header("Location:" . $_SERVER["PHP_SELF"] . "?event=show_exam");
				break;
		}
		if (substr($_POST["event"], 0, 3) != "nh_") include("inc/footer.php");
	}
	?>

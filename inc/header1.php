 <html>
 <!--<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> -->
 <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />

 <head>
 	<title>RIELES 2.0</title>
 	<link rel="stylesheet" type="text/css" href="css/default.css" />
 	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 	<script type="text/javascript">
 		jQuery(function($) {
 			$.datepicker.regional['es'] = {
 				closeText: 'Cerrar',
 				prevText: '&#x3c;Ant',
 				nextText: 'Sig&#x3e;',
 				currentText: 'Hoy',
 				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
 					'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
 				],
 				monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
 					'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
 				],
 				dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
 				dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie', 'S&aacute;b'],
 				dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;'],
 				weekHeader: 'Sm',
 				dateFormat: 'dd/mm/yy',
 				firstDay: 1,
 				isRTL: false,
 				showMonthAfterYear: false,
 				yearSuffix: ''
 			};
 			$.datepicker.setDefaults($.datepicker.regional['es']);
 		});

 		$(document).ready(function() {
 			$("#datepicker").datepicker();
 		});
 	</script>

 </head>

 <body bgcolor="grey">
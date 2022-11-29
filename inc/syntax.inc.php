<?php

	function t_data($content, $bgcolor="#ffffff",$align="center",$width="", $colspan="0"){
		echo "<td align=".$align." bgcolor=".$bgcolor." width=".$width." colspan=".$colspan.">"
					."<font color=black>".$content."</font></td>";
	}

	function newConnect(){
		$conn=mysqli_connect("localhost","root","5032cuidados","rieles");
		return $conn;
	}

	function sel_date($name,$str=1, $end=31,$opt_sel,$step=1){

		echo "<select name=".$name.">";
		for($i=$str;$i<=$end;){
			echo "<option opt>".(strlen($i)<2?"0".$i:$i);
			$i=$i+$step;
		}
		echo "<option selected>".$opt_sel;
		echo "</select>";
	}

	function month_toString($mes_nro,$mayus=0,$year=0){
	
	switch (intval($mes_nro)) {
		case 1: $mes= ($mayus==0?'Enero':'ENERO');				break;
		case 2: $mes= ($mayus==0?'Febrero':'FEBRERO');			break;
		case 3: $mes= ($mayus==0?'Marzo':'MARZO');				break;
		case 4: $mes= ($mayus==0?'Abril':'ABRIL');				break;
		case 5: $mes= ($mayus==0?'Mayo':'MAYO');					break;
		case 6: $mes= ($mayus==0?'Junio':'JUNIO');				break;
		case 7: $mes= ($mayus==0?'Julio':'JULIO');				break;
		case 8: $mes= ($mayus==0?'Agosto':'AGOSTO');				break;
		case 9: $mes= ($mayus==0?'Septiembre':'SEPTIEMBRE');	break;
		case 10:$mes= ($mayus==0?'Octubre':'OCTUBRE');			break;
		case 11:$mes= ($mayus==0?'Noviembre':'NOVIEMBRE');		break;
		case 12:$mes= ($mayus==0?'Diciembre':'DICIEMBRE');		break;
	}
	return ($year==1?$mes." ".(date("Y")):$mes);
	}

	function split_date($date){
		$datetime[]="";
		
		list($datetime["year"],$datetime["month"],$rest)=	explode("-",$date);
		if(strlen($rest)>2){	
			list($datetime["day"],$rest)=explode(" ",$rest);
			list($datetime["hr"],$datetime["min"],$datetime["sec"])=explode(":",trim($rest));
		}else{
			$datetime["day"]=$rest;
			list($datetime["hr"],$datetime["min"],$datetime["sec"])=0;
		}

		return $datetime;
	}

	function datediff($d1,$d2){

		list($date1,$time1)=explode(" ",$d1);
		list($date2,$time2)=explode(" ",$d2);

		list($year1,$month1,$day1)=explode("-",$date1);
		list($year2,$month2,$day2)=explode("-",$date2);

		//calculo timestam de las dos fechas
		$timestamp1 = mktime(0,0,0,$month1,$day1,$year1);
		$timestamp2 = mktime(4,12,0,$month2,$day2,$year2);

		//resto a una fecha la otra
		$segundos_diferencia = $timestamp1 - $timestamp2;
		//echo $segundos_diferencia;

		//convierto segundos en días
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

		//obtengo el valor absoulto de los días (quito el posible signo negativo)
		$dias_diferencia = abs($dias_diferencia);

		//quito los decimales a los días de diferencia
		$diff = floor($dias_diferencia);

		return $diff;

}
?>
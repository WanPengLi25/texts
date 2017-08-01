<?php

	echo '<h1>加法运算结果</h1>';
	echo '<table border="1">';
	$a = $_POST['one'];
	$b = $_POST['two'];
	$c = $_POST['three'];
	$d = $_POST['four'];
	$e = $_POST['five'];
	$f = $_POST['six'];

	
	function one($a,$b,$c,$d,$e,$f){
		//接收传过来的值
		
		//运算第一个数
		$ab = $a + $b;
		if($ab < max(0,34)){
			echo '<tr>';
			echo '<td>'.$a.'+'.$b.'='.$ab.'</td>';
			echo '</tr>';
		}else{
			echo $a.'+'.$b.'= 最大已经超过33';
		}
		echo "</table>";
		echo '<br>';
		//运算第二个数
		$ac = $a + $c;
		if($ac < max(0,34)){
			echo $a.'+'.$c.'='.$ac;
		}else{
			echo $a.'+'.$c.'=最大已经超过33';
		}
		echo '<br>';
		//运算第三个数
		$ad = $a + $d;
		if($ad < max(0,34)){
			echo $a.'+'.$d.'='.$ad;
		}else{
			echo $a.'+'.$d.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第四个数
		$ae = $a + $e;
		if($ae < max(0,34)){
			echo $a.'+'.$e.'='.$ae;
		}else{
			echo $a.'+'.$e.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第五个数
		$af = $a + $f;
		if($af < max(0,34)){
			echo $a.'+'.$f.'='.$af;
		}else{
			echo $a.'+'.$f.'= 最大已经超过33';
		}
		echo '<br>';
	}
	echo '第一个数的运算结果：<br>';
	one($a,$b,$c,$d,$e,$f);
		
	
	
	echo "<pre>";
	
	// 第一个数的运算程序结束	
	echo '<br>';

	//第二个数的运算程序
	function two($a,$b,$c,$d,$e,$f){
		//运算第一个数
		$ba = $b + $a;
		if($ba < max(0,34)){
			echo $b.'+'.$a.'='.$ba;
		}else{
			echo $b.'+'.$a.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第二个数
		$bc = $b + $c;
		if($bc < max(0,34)){
			echo $b.'+'.$c.'='.$bc;
		}else{
			echo $b.'+'.$c.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第三个数
		$bd = $b + $d;
		if($bd < max(0,34)){
			echo $b.'+'.$d.'='.$bd;
		}else{
			echo $b.'+'.$d.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第四个数
		$be = $b + $e;
		if($be < max(0,34)){
			echo $b.'+'.$e.'='.$be;
		}else{
			echo $b.'+'.$e.'= 最大已经超过33';
		}
		echo '<br>';
		//运算第五个数
		$bf = $b + $f;
		if($bf < max(0,34)){
			echo $b.'+'.$f.'='.$bf;
		}else{
			echo $b.'+'.$f.'= 最大已经超过33';
		}
		echo '<br>';
	}
	echo '第二个数的运算结果：<br>';
	two($a,$b,$c,$d,$e,$f);
	// 第二个数的运算结束程序结束
	echo '<br>';

	// //第三个数的运算程序
	// function three(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ca = $c + $a;
	// 	if($ca < max(0,34)){
	// 		echo $c.'+'.$a.'='.$ca;
	// 	}else{
	// 		echo $c.'+'.$a.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$cb = $c + $b;
	// 	if($cb < max(0,34)){
	// 		echo $c.'+'.$b.'='.$cb;
	// 	}else{
	// 		echo $c.'+'.$b.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$cd = $c + $d;
	// 	if($cd < max(0,34)){
	// 		echo $c.'+'.$d.'='.$cd;
	// 	}else{
	// 		echo $c.'+'.$d.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$ce = $c + $e;
	// 	if($ce < max(0,34)){
	// 		echo $c.'+'.$e.'='.$ce;
	// 	}else{
	// 		echo $c.'+'.$e.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$cf = $c + $f;
	// 	if($cf < max(0,34)){
	// 		echo $c.'+'.$f.'='.$cf;
	// 	}else{
	// 		echo $c.'+'.$f.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第三个数的运算结果：<br>';
	// three();
	// //第三个数的运算程序结束
	// echo '<br>';

	// // 第四个数的运算程序
	// function four(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$da = $d + $a;
	// 	if($da < max(0,34)){
	// 		echo $d.'+'.$a.'='.$da;
	// 	}else{
	// 		echo $d.'+'.$a.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$db = $d + $b;
	// 	if($db < max(0,34)){
	// 		echo $d.'+'.$b.'='.$db;
	// 	}else{
	// 		echo $d.'+'.$b.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$dc = $d + $c;
	// 	if($dc < max(0,34)){
	// 		echo $d.'+'.$c.'='.$dc;
	// 	}else{
	// 		echo $d.'+'.$c.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$de = $d + $e;
	// 	if($de < max(0,34)){
	// 		echo $d.'+'.$e.'='.$de;
	// 	}else{
	// 		echo $d.'+'.$e.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$df = $d + $f;
	// 	if($df < max(0,34)){
	// 		echo $d.'+'.$f.'='.$df;
	// 	}else{
	// 		echo $d.'+'.$f.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第四个数的运算结果：<br>';
	// four();
	// // 第四个数的运算结束
	// echo '<br>';

	// //第五个数的运算程序
	// function five(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ea = $e + $a;
	// 	if($ea < max(0,34)){
	// 		echo $e.'+'.$a.'='.$ea;
	// 	}else{
	// 		echo $e.'+'.$a.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$eb = $e + $b;
	// 	if($eb < max(0,34)){
	// 		echo $e.'+'.$b.'='.$eb;
	// 	}else{
	// 		echo $e.'+'.$b.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$ec = $e + $c;
	// 	if($ec < max(0,34)){
	// 		echo $e.'+'.$c.'='.$ec;
	// 	}else{
	// 		echo $e.'+'.$d.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$ed = $e + $d;
	// 	if($ed < max(0,34)){
	// 		echo $e.'+'.$d.'='.$ed;
	// 	}else{
	// 		echo '最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$ef = $e + $f;
	// 	if($ef < max(0,34)){
	// 		echo $e.'+'.$f.'='.$ef;
	// 	}else{
	// 		echo $e.'+'.$f.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第五个数的运算结果：<br>';
	// five();
	// // 第五个数的运算结束
	// echo '<br>';

	// //第六个数的运算程序
	// function six(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$fa = $f + $a;
	// 	if($fa < max(0,34)){
	// 		echo $f.'+'.$a.'='.$fa;
	// 	}else{
	// 		echo $f.'+'.$a.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$fb = $f + $b;
	// 	if($fb < max(0,34)){
	// 		echo $f.'+'.$b.'='.$fb;
	// 	}else{
	// 		echo $f.'+'.$b.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$fc = $f + $c;
	// 	if($fc < max(0,34)){
	// 		echo $f.'+'.$c.'='.$fc;
	// 	}else{
	// 		echo $f.'+'.$c.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$fd = $f + $d;
	// 	if($fd < max(0,34)){
	// 		echo $f.'+'.$d.'='.$fd;
	// 	}else{
	// 		echo $f.'+'.$d.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$fe = $f + $e;
	// 	if($fe < max(0,34)){
	// 		echo $f.'+'.$e.'='.$fe;
	// 	}else{
	// 		echo $f.'+'.$e.'= 最大已经超过33';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第六个数的运算结果：<br>';
	// six();
	// // 第六个数的运算结束
	// echo '<br>';

	// echo '<h1>减法的运算：</h1><br>';
	// //第一个算的减法运算
	// function jone(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ab = $a - $b;
	// 	if($ab > min(0,-1)){
	// 		echo $a.'-'.$b.'='.$ab;
	// 	}else{
	// 		echo $a.'-'.$b.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$ac = $a - $c;
	// 	if($ac > max(0,-1)){
	// 		echo $a.'-'.$c.'='.$ac;
	// 	}else{
	// 		echo $a.'-'.$c.'= 已经是负数或者0';
			
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$ad = $a - $d;
	// 	if($ad > max(0,-1)){
	// 		echo $a.'-'.$d.'='.$ad;
	// 	}else{
	// 		echo $a.'-'.$d.'= 已经是负数或者0';
			
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$ae = $a - $e;
	// 	if($ae > max(0,-1)){
	// 		echo $a.'-'.$e.'='.$ae;
	// 	}else{
	// 		echo $a.'-'.$e.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$af = $a - $f;
	// 	if($af > max(0,-1)){
	// 		echo $a.'-'.$f.'='.$af;
	// 	}else{
	// 		echo $a.'-'.$f.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第一个数的减法运算结果：<br>';
	// jone();
	// // 第一个数的减法运算结束

	// echo '<br>';

	// //第二个数的减法运算
	// function jtwo(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ba = $b - $a;
	// 	if($ba > min(0,-1)){
	// 		echo $b.'-'.$a.'='.$ba;
	// 	}else{
	// 		echo $b.'-'.$a.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$bc = $b - $c;
	// 	if($bc > max(0,-1)){
	// 		echo $b.'-'.$c.'='.$bc;
	// 	}else{
	// 		echo $b.'-'.$c.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$bd = $b - $d;
	// 	if($bd > max(0,-1)){
	// 		echo $b.'-'.$d.'='.$bd;
	// 	}else{
	// 		echo $b.'-'.$d.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$be = $b - $e;
	// 	if($be > max(0,-1)){
	// 		echo $b.'-'.$e.'='.$be;
	// 	}else{
	// 		echo $b.'-'.$e.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$bf = $b - $f;
	// 	if($bf > max(0,-1)){
	// 		echo $b.'-'.$f.'='.$bf;
	// 	}else{
	// 		echo $b.'-'.$f.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第二个数的减法运算结果：<br>';
	// jtwo();
	// //第二个数的减法运算结束

	// echo '<br>';

	// //第三个数的减法运算
	// function jthree(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ca = $c - $a;
	// 	if($ca > min(0,-1)){
	// 		echo $c.'+'.$a.'='.$ca;
	// 	}else{
	// 		echo $c.'+'.$a.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$cb = $c - $b;
	// 	if($cb > max(0,-1)){
	// 		echo $c.'-'.$b.'='.$cb;
	// 	}else{
	// 		echo $c.'-'.$b.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$cd = $c - $d;
	// 	if($cd > max(0,-1)){
	// 		echo $c.'-'.$d.'='.$cd;
	// 	}else{
	// 		echo $c.'-'.$d.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$ce = $c - $e;
	// 	if($ce > max(0,-1)){
	// 		echo $c.'-'.$e.'='.$ce;
	// 	}else{
	// 		echo $c.'-'.$e.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$cf = $c - $f;
	// 	if($cf > max(0,-1)){
	// 		echo $c.'-'.$f.'='.$cf;
	// 	}else{
	// 		echo $c.'-'.$f.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第三个数的减法运算结果：<br>';
	// jthree();
	// //第三个数的减法运算结束

	// echo '<br>';

	// //第四个数的减法运算
	// function jfour(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$da = $d - $a;
	// 	if($da > min(0,-1)){
	// 		echo $d.'-'.$a.'='.$da;
	// 	}else{
	// 		echo $d.'-'.$a.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$db = $d - $b;
	// 	if($db > max(0,-1)){
	// 		echo $d.'-'.$b.'='.$db;
	// 	}else{
	// 		echo $d.'-'.$b.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$dc = $d - $c;
	// 	if($dc > max(0,-1)){
	// 		echo $d.'-'.$c.'='.$dc;
	// 	}else{
	// 		echo $d.'-'.$c.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$de = $d - $e;
	// 	if($de > max(0,-1)){
	// 		echo $d.'-'.$e.'='.$de;
	// 	}else{
	// 		echo $d.'-'.$e.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$df = $d - $f;
	// 	if($df > max(0,-1)){
	// 		echo $d.'-'.$f.'='.$df;
	// 	}else{
	// 		echo $d.'-'.$f.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第四个数的减法运算结果：<br>';
	// jfour();
	// //第四个数的运算结束

	// echo '<br>';

	// //第五个数的减法运算
	// function jfive(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$ea = $e - $a;
	// 	if($ea > min(0,-1)){
	// 		echo $e.'-'.$a.'='.$ea;
	// 	}else{
	// 		echo $e.'-'.$a.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$eb = $e - $b;
	// 	if($eb > max(0,-1)){
	// 		echo $e.'-'.$b.'='.$eb;
	// 	}else{
	// 		echo $e.'-'.$b.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$ec = $e - $c;
	// 	if($ec > max(0,-1)){
	// 		echo $e.'-'.$c.'='.$ec;
	// 	}else{
	// 		echo $e.'-'.$c.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$ed = $e - $d;
	// 	if($ed > max(0,-1)){
	// 		echo $e.'-'.$d.'='.$ed;
	// 	}else{
	// 		echo $e.'-'.$d.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$ef = $e - $f;
	// 	if($ef > max(0,-1)){
	// 		echo $e.'-'.$f.'='.$ef;
	// 	}else{
	// 		echo $e.'-'.$f.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第五个数的减法运算结果：<br>';
	// jfive();
	// //第五个数的减法运算结束

	// echo '<br>';

	// //第六个数的减法运算
	// function jsix(){
	// 	//接收传过来的值
	// 	$a = $_POST['one'];
	// 	$b = $_POST['two'];
	// 	$c = $_POST['three'];
	// 	$d = $_POST['four'];
	// 	$e = $_POST['five'];
	// 	$f = $_POST['six'];
	// 	//运算第一个数
	// 	$fa = $f - $a;
	// 	if($fa > min(0,-1)){
	// 		echo $f.'-'.$a.'='.$fa;
	// 	}else{
	// 		echo $f.'-'.$a.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第二个数
	// 	$fb = $f - $b;
	// 	if($fb > max(0,-1)){
	// 		echo $f.'-'.$b.'='.$fb;
	// 	}else{
	// 		echo $f.'-'.$b.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第三个数
	// 	$fc = $f - $c;
	// 	if($fc > max(0,-1)){
	// 		echo $f.'-'.$c.'='.$fc;
	// 	}else{
	// 		echo $f.'-'.$c.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第四个数
	// 	$fd = $f - $d;
	// 	if($fd > max(0,-1)){
	// 		echo $f.'-'.$d.'='.$fd;
	// 	}else{
	// 		echo $f.'-'.$d.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// 	//运算第五个数
	// 	$fe = $f - $e;
	// 	if($fe > max(0,-1)){
	// 		echo $f.'-'.$e.'='.$fe;
	// 	}else{
	// 		echo $f.'-'.$e.'= 已经是负数或者0';
	// 	}
	// 	echo '<br>';
	// }
	// echo '第六个数的减法运算结果：<br>';
	// jsix();



  ?>
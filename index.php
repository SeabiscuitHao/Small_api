<?php
	// $a = $_GET['a'];
	// $c = $_GET['c'];
	header("Content-type:text/html;charset=utf-8");
	include './common/function.php';
	$c = !empty($_GET['c']) ? $_GET['c'] : 'message';
	$a = !empty($_GET['a']) ? $_GET['a'] : 'lists';
	$c = ucfirst($c);


	//当执行一个不存在的类的时候执行的函数__autoload()
	function __autoload($a) {
		include "./controller/{$a}.class.php";
	}

	$classname = "{$c}Controller";
	$obj = new $classname;
	$obj -> $a();
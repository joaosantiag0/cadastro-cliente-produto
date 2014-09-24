<?php
$page = $_GET['page'];
$action = $_GET['op'];
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($page) || !isset($action)){
	//$page = "index";
	//$action = "index";
	header("Location: index.php?page=index&op=index");
}

$class = $page.'Controller';

require_once 'control/'.$class.'.php';
$do = new $class();
$do->$action();
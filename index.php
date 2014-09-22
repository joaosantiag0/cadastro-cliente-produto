<?php
$page = $_GET['page'];
$action = $_GET['op'];

if(!isset($page) || !isset($action)){
	$page = "index";
	$action = "index";
	
}

$class = $page.'Controller';

require_once 'control/'.$class.'.php';
$do = new $class();
$do->$action();
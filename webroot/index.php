<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'autoload.php');

App::run($_SERVER['REQUEST_URI']);

/*	db table: users
	db rows: id(int), name(varchar), email(varchar), pass(md5) */

/*$user = array(1,"admin", "admin@test.com", "PaSsWoRd1");
$tasks = array(1, "Актерское мастерство", "Курсы актерского мастерства", 1, 0, date(Y));

print_r($user);
print_r($tasks);*/
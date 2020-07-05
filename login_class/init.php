<?php

session_start();
spl_autoload_register(function($class_name){
	include "C:/xampp/htdocs/PHP/oop_login/login_class/$class_name.php";
});



$source=new source;

?>
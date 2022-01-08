<?php

function controllers_utoload($classname){
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_utoload');
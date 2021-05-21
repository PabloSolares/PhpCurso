<?php

function controllers_autoload($class){
	require 'controllers/' . $class . '.php';
}

spl_autoload_register('controllers_autoload');
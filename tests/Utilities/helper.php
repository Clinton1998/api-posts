<?php

if(!function_exists('create')){
	function create($class,$attr = []){
		return factory($class)->create($attr);
	}	
}

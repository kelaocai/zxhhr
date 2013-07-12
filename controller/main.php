<?php
class main extends spController
{
	function index(){
		//echo "Enjoy, Speed of PHP!";
		
		$this->cnt=668;//spDB('hello')->findCount();
		$this->display('index.html');
	}
}
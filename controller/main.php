<?php
class main extends spController
{
	function index(){
		//echo "Enjoy, Speed of PHP!";
		
		$this->cnt=spDB('hello')->findCount();
		$this->display('index.html');
	}
	
	function topic(){
		$this->display('topic.html');
	}
}
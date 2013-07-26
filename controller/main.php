<?php
class main extends spController

{
	function index(){
		//echo "Enjoy, Speed of PHP!";
		
		//$this->cnt=spDB('hello')->findCount();
		//$_SESSION['user_email']="kekk";
		//$this->login_status=$_SESSION['user_email'];
		session_start();
		if ($_SESSION['user_email']){
			$this->login_status=TRUE;
			$this->user_email=$_SESSION['user_email'];
		}
		$this->display('index.html');
	}
	
	function topic(){
		$this->display('topic.html');
	}
}
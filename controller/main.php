<?php
class main extends spController

{
	function index(){

		if ($_SESSION['user_email']){
			$this->login_status=TRUE;
			$this->user_email=$_SESSION['user_email'];
		}
		
	}
	
	function topic(){
		$this->display('topic.html');
	}
	
	function login_ui(){
		
	}
	
	function login(){
		
	 	$usrobj=spClass('user');
		$con=array('phone'=>$this->spArgs('phoneno'),'password'=>$this->spArgs('password'));
		$rs=$usrobj->find($con);
		if ($rs){
			$_SESSION['user_email']=$rs['email'];
			//echo "login success!".$_SESSION['user_email'];
			$this->jump(spUrl('my','portal'));
		}else{
			echo "login failed!";
		}
	}
	
	public function logout(){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {setcookie(session_name(), '', time()-42000, '/');}
		session_destroy();
		// 跳转回首页
		$this->success("已退出，返回首页！", spUrl("main","index"));
	}
}
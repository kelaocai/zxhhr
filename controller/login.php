<?php
class login extends spController {
	function login_ui(){
		$this->display('ui_login.html');
	}
	
	function login_submit(){
		
	 	$usrobj=spClass('user');
		$con=array('email'=>$this->spArgs('email'),'password'=>$this->spArgs('password'));
		$rs=$usrobj->find($con);
		if ($rs){
			$_SESSION['user_email']=$rs['email'];
			//echo "login success!".$_SESSION['user_email'];
			$this->jump(spUrl('main','index'));
		}else{
			echo "login failed!";
		}
	}
}

<?php
class register extends spController {
	function reg_new_user_ui() {
		$this -> display('reg_new_user_ui.html');
	}

	function reg_submit() {
		$userobj = spClass('user');
		// 在注册的时候
		$userobj -> verifier = $userobj -> verifier_register;
		// 切换验证规则
		if (false == $userobj -> spVerifier($this -> spArgs())) {
			// 开始验证
		} else {
			//dump($userobj->sp)
			dump($userobj -> verifier);
		}
	}

	function check_email() {
		$userobj = spClass('user');
		if ($userobj->findCount("email='".$this->spArgs('email')."'")>0) {
			echo "该邮箱已被注册，请更换一个";
		}else{
			echo "ok";
		}
	}

}

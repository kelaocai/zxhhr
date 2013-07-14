<?php
class register extends spController {
	function reg_new_user_ui() {
		$this -> display('reg_new_user_ui.html');
	}

	function reg_submit() {

		// 在注册的时候
		$userobj -> verifier = $userobj -> verifier_register;
		// 切换验证规则
		if (false == $userobj -> spVerifier($this -> spArgs())) {
			// 开始验证
		}else{
			//dump($userobj->sp)
		}
	}

}

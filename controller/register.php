<?php
class register extends spController {
	function reg_new_user_ui() {
		$this -> display('reg_new_user_ui.html');
	}

	function reg_submit() {
		$userobj = spClass('user');
		//注册校验
		$userobj -> verifier = $userobj -> verifier_register;
		$rs_ver = $userobj -> spVerifier($this -> spArgs());
		// 切换验证规则
		if (false == $rs_ver) {
			//通过验证
			$now = date("Y-m-d H:i:s", time());
			$new_user = array("email" => $this -> spArgs('email'), "phone" => $this -> spArgs('phone'), "password" => $this -> spArgs('password'), "reg_date" => $now);
			$rs_create = $userobj -> create($new_user);
			if ($rs_create > 0) {
				echo "注册成功！";

			} else {
				echo "注册新用户错误";
			}
		} else {
			dump($rs_ver);
		}
	}

	function check_email() {
		if ($this -> verifier_email($this -> spArgs('email'))) {
			echo "ok";
		} else {
			echo "error";
		}
	}

	function verifier_email($val, $right) {

		$userobj = spClass('user');
		if ($userobj -> findCount("email='" . $val . "'") > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

}

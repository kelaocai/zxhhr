<?php
class register extends spController {
	function register_ui() {

	}

	function register_submit() {
		$userobj = spClass('user');
		//注册校验
		$userobj -> verifier = $userobj -> verifier_register;
		$rs_ver = $userobj -> spVerifier($this -> spArgs());
		// 切换验证规则
		if (false == $rs_ver) {
			//通过验证
			$now = date("Y-m-d H:i:s", time());
			$new_user = array("email" => $this -> spArgs('email'), "phone" => $this -> spArgs('phoneno'), "password" => $this -> spArgs('password'), "reg_date" => $now);
			$rs_create = $userobj -> create($new_user);
			if ($rs_create > 0) {
				$success_msg=array("title"=>"注册成功",
						   "content"=>"恭喜您注册成为本站会员，现在你可以登录后进行相关操作",
						   "btn_txt"=>"登录",
						   "btn_action"=>spUrl("main",'login_ui')
						   				
				);
				$this->msg=$success_msg;
				//dump($success_msg);
				$this->display("success.html");

			} else {
				$success_msg=array("title"=>"注册失败",
						   "content"=>"提交失败",
						   "btn_txt"=>"重新注册",
						   "btn_action"=>spUrl("register",'register_ui')
						   );
				$this->display("error.html");
						   				
				
			}
		} else {
			$err_msg=array("title"=>"注册失败",
						   "content"=>$this->ouput_ver($rs_ver),
						   "btn_txt"=>"重新注册",
						   "btn_action"=>spUrl("register",'register_ui')
						   				
				);
			$this->msg=$err_msg;
			$this->display("error.html");
			
		}
	}

	function check_phoneno(){
		if($this->verifier_phoneno($this->spArgs('phoneno'))){
			echo "yes";
		}else{
			echo "no";
		};	
	}
	

	function ouput_ver($ver){
		
		$rs="<ol>";
		foreach($ver as $key=>$value){
			foreach($value as $key2=>$value2){
				$rs.="<li>".$value2."</li>";
			}
		}
		
		$rs.="</ol>";
		
		return  $rs;
	}

	

	//验证邮箱
	function verifier_email($val, $right) {

		$userobj = spClass('user');
		if ($userobj -> findCount("email='" . $val . "'") > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	//验证手机号码
	function verifier_phoneno($val, $right) {

		$userobj = spClass('user');
		if ($userobj -> findCount("phone='" . $val . "'") > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

}

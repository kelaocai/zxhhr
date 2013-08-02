<?php
class promote extends spController {
	
	
	public function __construct(){
		parent::__construct(); 
		$this->now_position="我的推荐";
       
    }
	
	function index(){
		
	}
	
	function addressbook(){
		$this->now_position="人脉管理";
	}	
	
	function share(){
		$this->now_position="我要推荐";
	}	

}
?>
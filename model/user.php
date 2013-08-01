<?php
class user extends spModel
{
        public $pk = 'id';
        public $table = 'user';
		
		
		//添加自定义规则
		var $addrules=array(
		'verify_phoneno'=>array('register','verifier_phoneno')
		);

        // 这个是注册的验证规则
        var $verifier_register = array(
                "rules" => array( // 规则
                        'password' => array(  
                                'notnull' => TRUE, 
                                'minlength' => 6, 
                                'maxlength' => 30,
                        ),
                        'confirm_password' => array( 
                                'equalto' => 'password',
                        ),
                        'phoneno' => array(  
                                'notnull' => TRUE,
                                'minlength' => 11, 
                                'maxlength' => 11,
                                'verify_phoneno'=>TRUE
                                
                        ),
                ),
                "messages" => array( // 提示消息，从上面的rules复制下来，很快捷。
                        'username' => array(  
                                'notnull' => "用户名不能为空", 
                                'minlength' => "用户名长度不能少于3个字符",  
                                'maxlength' => "用户名长度不能大于15个字符",
                        ),
                        'password' => array(  
                                'notnull' => "密码不能为空", 
                                'minlength' => "密码长度不能少于6个字符",  
                                'maxlength' => "密码长度不能大于30个字符", 
                        ),
                        'confirm_password' => array( 
                                'equalto' => '两次输入的密码不一样',
                        ),
                        'phoneno' => array(   
                                'notnull' => "手机号码不能为空",
                                'verify_phoneno'=>"该手机号码已经被注册"
                        ),
                ),
        );
        // 这是登录的验证
        var $verifier_login = array(
                "rules" => array( 
                        'username' => array( 
                                'notnull' => TRUE,
                                'minlength' => 3, 
                                'maxlength' => 15,
                        ),
                        'password' => array( 
                                'notnull' => TRUE, 
                                'minlength' => 6,  
                                'maxlength' => 30, 
                        ),
                ),
                "messages" => array( // 提示消息，从上面的rules复制下来，很快捷。
                        'username' => array(  
                                'notnull' => "用户名不能为空", 
                                'minlength' => "用户名长度不能少于3个字符",  
                                'maxlength' => "用户名长度不能大于15个字符",
                        ),
                        'password' => array(  
                                'notnull' => "密码不能为空", 
                                'minlength' => "密码长度不能少于6个字符",  
                                'maxlength' => "密码长度不能大于30个字符", 
                        ),
                ),
        );
		
		
		
}
?>
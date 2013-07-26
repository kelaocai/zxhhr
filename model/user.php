<?php
class user extends spModel
{
        public $pk = 'id';
        public $table = 'user';
		
		
		//添加自定义规则
		var $addrules=array(
		'checkemail'=>array('register','verifier_email')
		);

        // 这个是注册的验证规则
        var $verifier_register = array(
                "rules" => array( // 规则
                        'password' => array(  
                                'notnull' => TRUE, 
                                'minlength' => 6, 
                                'maxlength' => 30,
                        ),
                        'compassword' => array( 
                                'equalto' => 'password',
                        ),
                        'email' => array(  
                                'notnull' => TRUE,
                                'email' => TRUE,  
                                'minlength' => 6, 
                                'maxlength' => 30,
                                'checkemail'=>TRUE
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
                        'compassword' => array( 
                                'equalto' => '两次输入的密码不一样',
                        ),
                        'email' => array(   
                                'notnull' => "电子邮件不能为空",
                                'email' => "电子邮件格式不正确",  
                                'minlength' => "电子邮件长度不能少于6个字符",  
                                'maxlength' => "电子邮件长度不能大于30个字符", 
                                'checkemail'=>"该邮箱已被注册"
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
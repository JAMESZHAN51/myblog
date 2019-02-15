<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/28
 * Time: 21:36
 */

namespace app\common\validate;

use think\Validate;

class Member extends Validate
{
    protected $rule = [
        'name|用户名'=> 'require|unique:member',
        'password|密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'oldpass|旧密码' => 'require',
        'newpass|新密码' => 'require',
        'nickname|昵称' => 'require',
        'email|邮箱' => 'require|email|unique:member',
        'verify|验证码' => 'require|captcha'

    ];

    //添加场景
     public function sceneAdd()
     {
         return $this->only(['name','password','nickname','email']);
     }
    //修改场景
    public function sceneEdit()
    {
        return $this->only(['oldpass','nickname','newpass']);
    }

    //注册场景
    public function sceneRegister()
    {
        return $this->only(['name','password','conpass','nickname','email','verify']);
    }

    //登录场景
    public function sceneLogin()
    {
        return $this->only(['name','password','verify'])
            ->remove('name','unique');
    }
}
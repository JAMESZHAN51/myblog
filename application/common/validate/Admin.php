<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/22
 * Time: 8:53
 */

namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{
    protected  $rule = [
        'name|管理员账户'=>'require',
        'password|密码' =>'require',
        'oldpass|原密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'nickname|昵称' =>'require',
        'email|邮箱' => 'require|email|unique:admin',
        'code|验证码' => 'require'
    ];



    //登录验证场景
    public function sceneLogin()
    {
        return $this->only(['name','password']);
    }

    //注册验证场景
    public function sceneRegister()
    {
        return $this->only(['name','password','conpass','nickname','email'])
            ->append('name','unique:admin');
    }

    //重置密码验证场景
    public function sceneReset()
    {
        return $this->only(['code'])
        ->append('name','unique:admin');
    }

    //添加场景
    public function sceneAdd()
    {
        return $this->only(['name','password','conpass','email','nickname']);
    }

    //编辑场景
    public function sceneEdit()
    {
        return $this->only(['oldpass','newpass','nickname']);
    }

}
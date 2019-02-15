<?php

namespace app\admin\controller;


use think\Controller;

class Index extends Controller
{
    //重复登录过滤
    public function initialize()
    {
        if (session('?name.id')) {
            $this->redirect('admin/home/index');
        }
    }


    //后台登录
    public function login()
    {
        if (request()->isAjax())
        {
            //接收前台用户数据
            $data = [
                'name' =>input('post.name'),
                'password' =>input('post.password'),
            ];
            $return = model('Admin')->login($data);

            if ($return == 1){

                $this->success('登录成功!','admin/home/index');
            }else{

                $this->error($return);
            }
        }
        return view();
    }

    //注册
    public function register()
    {
        if (request()->isAjax()) {
            $data = [
                'name' => input('post.name'),
                'password' => input('post.password'),
                'conpass' =>  input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email' =>    input('post.email')
        ];
            $result = model('Admin')->register($data);
            if ($result == 1) {
                $this->success('注册成功!', 'admin/index/login');
            }else{
                $this->error($result);
            }
    }
        return view();
    }

    //忘记密码 发送验证码
    public function forget()
    {
        if (request()->isAjax()) {
            $code = mt_rand(1000,9999);
            session('code' ,$code);
            $result = mailto(input('post.email'),'重置密码验证码','您的重置密码的验证码是:'.$code);
            if ($result) {
                $this->success('验证码发送成功!');
            }else{
                $this->error('验证码发送失败!');
            }
    }
        return view();
    }

    //重置密码
    public function reset()
    {
        $data = [
        'code' => input('post.code'),
        'email' => input('post.email')
        ];
        $result = model('Admin')->reset($data);
        if ($result == 1) {
            $this->success('密码重置成功,请去邮箱查看新密码', 'admin/index/login');
        }else{
            $this->error($result);
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/25
 * Time: 15:14
 */

namespace app\common\validate;


use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename|栏目名称' => 'require|unique:cate',
        'sort|排序' => 'require|number'
    ];
    public function sceneAdd()
    {
        return $this->only(['catename','sort']);
    }

    //排序场景
    public function sceneSort()
    {
        return $this->only(['sort']);
    }

    //修改场景
    public function sceneEdit()
    {
        return $this->only(['catename']);
    }

}
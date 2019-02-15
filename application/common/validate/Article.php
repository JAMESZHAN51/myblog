<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/26
 * Time: 15:56
 */

namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule =[
        'title|文章标题' => 'require|unique:article',
        'tags|标签' => 'require',
        'cateid|所属栏目' => 'require',
        'desc|文章概要' => 'require',
        'content|内容' => 'require',
        'is_top|推荐' => 'require'
    ];

    public function sceneAdd()
    {
        return $this->only(['title','tags','cateid','desc','content']);
    }

    //推荐场景
    public  function sceneTop() {
        return $this->only(['is_top']);
    }

    //文章修改
     public function sceneEdit()
     {
         return $this->only(['title','tags','is_top','cateid','desc','content']);
     }
}
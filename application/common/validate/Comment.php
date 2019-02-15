<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/29
 * Time: 21:46
 */

namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{

    protected $rule = [
        'content' =>'require'
    ];
}
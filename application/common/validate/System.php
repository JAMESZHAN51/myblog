<?php
/**
 * Created by PhpStorm.
 * User: ZHAN
 * Date: 2019/1/30
 * Time: 9:24
 */

namespace app\common\validate;


use think\Validate;

class System extends Validate
{
    protected $rule = [
        'webname|网站标题' =>'require',
        'copyright|版权信息' =>'require',
    ];
}
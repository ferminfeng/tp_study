<?php

namespace app\index\model;

use think\Model;

class User extends Model {

    // birthday读取器
    // user_birthday读取器
    protected function getUserBirthdayAttr($value, $data) {
        return date('Y-m-d', $data['birthday']);
    }

    // 定义类型转换
    protected $type = [
        'birthday' => 'timestamp:Y/m/d',
    ];

}

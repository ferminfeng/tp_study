<?php

namespace app\api\model;

use think\Model;

class User extends Model {

// 定义一对一关联
    public function profile() {
        return $this->hasOne('Profile');
    }

}

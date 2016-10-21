<?php

namespace app\api\model;

use think\Model;

class Profile extends Model {

    protected $type = [
        'birthday' => 'timestamp:Y-m-d',
    ];

}

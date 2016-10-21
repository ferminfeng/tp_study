<?php

namespace app\api\controller\v1;


class User {

// 获取用户信息
    public function read($id = 0) {
        $user = model("user")->get($id);
        if ($user) {
            return json($user);
        } else {
            return json(['error' => '用户不存在'], 404);
        }
    }

}

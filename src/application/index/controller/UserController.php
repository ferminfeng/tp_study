<?php

namespace app\index\controller;

use think\Controller;

class UserController extends Controller {
    /*
     * 操作model
     */

    // 新增用户数据
    public function add() {
        $user = model("user");
        if ($user->allowField(true)->validate(true)->save(input('post.'))) {
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }

    // 批量新增用户数据
    public function addList() {
        $user = model("user");
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1
988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-0
9-19')],
        ];
        if ($user->saveAll($list)) {
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
    }

    // 读取用户数据
    public function read($id = '') {
        //$user = model("user")->get($id);
        $user = model("user")->get(['nickname' => '流年']);
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo date('Y/m/d', $user->birthday) . '<br/><br/><br/>';

        echo $user['nickname'] . '<br/>';
        echo $user['email'] . '<br/>';
        echo date('Y/m/d', $user['birthday']) . '<br/>';
    }

    // 获取用户数据列表
    public function index_s() {
        //$list = model("user")->all(['nickname' => '流年','email'=>'thinkphp@qq.com']);
        $list = model("user")->where('id', '<', 3)->select();
        //$list = model("user")->where('email','like','%thin%')->select();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            //echo date('Y/m/d', $user->birthday) . '<br/>';
            echo $user->birthday . '<br/>';
            echo $user->user_birthday . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    // 更新用户数据
    public function update($id) {
        $user = model("user")->get($id);
        $user->nickname = '刘晨';
        $user->email = 'liu21st@gmail.com';
        if (false !== $user->save()) {
            return '更新用户成功';
        } else {
            return $user->getError();
        }
    }

    // 删除用户数据
    public function delete($id) {
        $user = model("user")->get($id);
        if ($user) {
            $user->delete();
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    // 创建用户数据页面
    public function create() {
        return view();
    }

    /*
     * 模版输出
     */

    // 获取用户数据列表并输出
    public function index() {
        //输出全部
        //$list = model("user")->all();
//        $this->assign('count', count($list));
        
        // 分页输出列表 每页显示3条数据
        $list = model("user")->paginate(3);
        
        $this->assign('title', '哈哈哈');
        $this->assign('list', $list);
        
        return $this->fetch();
    }

}

<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


//设置后访问 index.php/index/index/hello/name/aa 后只能使用  index.php/hello 来访问,加中括号则说明name参数可选
//方法一
//use think\Route;
//Route::rule('hello/[:name]','index/index/hello');

//方法二
return [
    //添加路由规则 路由到index控制器的hello方法   
    'hello/[:name]' => 'index/index/hello',
    
    //闭包函数,其实就是直接执行后面function内的代码,是为某些特殊的场景定义路由规则
    'hellotwo/[:name]' => function($name){
        return "nihao,". $name . '1';
    },

];

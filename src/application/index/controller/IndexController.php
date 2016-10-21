<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class IndexController extends Controller
{
    
    /*
     * 默认入口
     */
    public function index($name = 'thinkphp_index')
    {
        halt([1,2,3,4]);
        $this->assign('name', $name);
        return $this->fetch();
    }
    
    /*
     * 其他方法
     */
    public function hello($name = 'thinkphp_hello')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }
    
    /*
     * 查询数据库
     */
    public function index_db()
    {
        $data = Db::name('data')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }
    
    /*
     * 操作数据库
     */
    
    // 插入记录
    public function db_create(){
        $result = Db::execute('insert into think_data (id, name ,status) values (5, "thinkphp",1)');
        dump($result);
    }
    
    // 更新记录
    public function db_update(){
        $result = Db::execute('update think_data set name = "framework" where id = 5 ');
        dump($result);
    }
    
    // 查询数据
    public function db_select(){
        $result = Db::query('select * from think_data where id = 5');
        dump($result);
    }
    
    //删除数据
    public function db_delete(){
        $result = Db::execute('delete from think_data where id = 5 ');
        dump($result);
    }
    
    /*
     * 其它操作
     * 可以执行一些其他的数据库操作，原则上，读操作都使用query方法，写操作使用execute方法即可
     * query方法用于查询，默认情况下返回的是数据集（二维数组），execute方法的返回值是影响的行数
     */
    public function db_other(){
        // 显示数据库列表
        $result = Db::query('show tables from demo');
        dump($result);
        // 清空数据表
        $result = Db::execute('TRUNCATE table think_data');
        dump($result);
    }
    
    /*
     * 切换数据库
     * 在进行数据库查询的时候，支持切换数据库进行查询
     * 
     */
    public function db_cut(){
        $result = Db::connect([
            // 数据库类型
            'type'     => 'mysql',
            // 服务器地址
            'hostname' => '127.0.0.1',
            // 数据库名
            'database' => 'think_data',
            // 数据库用户名
            'username' => 'root',
            // 数据库密码
            'password' => '123456',
            // 数据库连接端口
            'hostport' => '3306',
            // 数据库连接参数
            'params'   => [],
            // 数据库编码默认采用utf8
            'charset'  => 'utf8',
            // 数据库表前缀
            'prefix'   => 'think_',
        ])->query('select * from think_data');
        dump($result);
        
        //或者采用字符串方式定义（字符串方式无法定义数据表前缀和连接参数）
        $result = Db::connect('mysql://root:123456@127.0.0.1:3306/thinkphp#utf8')->query('select * from think_data where id = 1');
        dump($result);
    }
    
    /*
     * 查询构造器
     */
    public function db_operate(){
        // 插入记录
        Db::name('data')
            ->insert(['id' => 18, 'name' => 'thinkphp']);

        // 更新记录
        Db::name('data')
            ->where('id', 18)
            ->update(['name' => "framework"]);

        // 查询数据
        $list = Db::name('data')
            ->where('id', 18)
            ->select();
        dump($list);

        // 删除数据
        Db::name('data')
            ->where('id', 18)
            ->delete();
    }
    
    /*
     * 链式操作
     * 使用链式操作可以完成复杂的数据库查询操作
     * 支持链式操作的查询方法包括：

        方法名	描述
        select	查询数据集
        find	查询单个记录
        insert	插入记录
        update	更新记录
        delete	删除记录
        value	查询值
        column	查询列
        chunk	分块查询
        count等	聚合查询
     */
    public function db_operate_two(){
        // 查询十个满足条件的数据 并按照id倒序排列
        $list = Db::name('data')
            ->where('status', 1)
            ->field('id,name')
            ->order('id', 'desc')
            ->limit(10)
            ->select();
        dump($list);
    }
    
    /*
     * 事务支持
     */
    
    //最简单的方法就是使用transaction方法，只需要把需要执行的事务操作封装到闭包里面即可自动完成事务
    
    public function db_transaction(){
        Db::transaction(function () {
            Db::table('think_user')
                ->delete(1);
            Db::table('think_data')
                ->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]);
        });
    }
    
    //手动控制事务的提交
    
    public function db_startTrans(){
        // 启动事务
        Db::startTrans();
        try {
            Db::table('think_user')
                ->delete(1);
            Db::table('think_data')
                ->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
    }
    
    /*
     * 自动转换为输出json格式数据
     * 
     * 修改config内的default_return_type = json 才可以
     */
    public function echo_json()
    {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        //return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        
        // 指定json数据输出
        return json(['data'=>$data,'code'=>1,'message'=>'操作完成']);
        
        
        // 指定xml数据输出
        return xml(['data'=>$data,'code'=>1,'message'=>'操作完成']);
    }
    
    /*
     * 空操作
     */
    public function _empty($name)
    {
        //把所有城市的操作解析到city方法
        return $this->city($name);
    }
    
    public function city($name)
    {
        //输出xml方法
        return xml(['data'=>$name,'code'=>1,'message'=>'操作完成']);
        
        //把所有城市的操作解析到city方法
        return json(['data'=>$name,'code'=>1,'message'=>'操作完成']);
    }
    
    
    
    
}
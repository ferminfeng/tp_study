<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"E:\fyflzjz_github\tp_study\src\public/../application/index\view\user\index.html";i:1477042647;s:80:"E:\fyflzjz_github\tp_study\src\public/../application/index\view\user\layout.html";i:1477042582;s:80:"E:\fyflzjz_github\tp_study\src\public/../application/index\view\user\header.html";i:1477041943;s:80:"E:\fyflzjz_github\tp_study\src\public/../application/index\view\user\footer.html";i:1477041787;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>哈哈哈</title>
        <style>
            body{
                color: #333;
                font: 16px Verdana, "Helvetica Neue", helvetica, Arial, 'Microsoft YaHei', sans-serif;
                margin: 0px;
                padding: 20px;
            } 
            a{
                color: #868686;
                cursor: pointer;
            }
            a:hover{
                text-decoration: underline;
            }
            h2{
                color: #4288ce;
                font-weight: 400;
                padding: 6px 0;
                margin: 6px 0 0;
                font-size: 28px;
                border-bottom: 1px solid #eee;
            }
            div{
                margin:8px;
            }
            .info{
                padding: 12px 0;
                border-bottom: 1px solid #eee;
            }
            .copyright{
                margin-top: 24px;
                padding: 12px 0;
                border-top: 1px solid #eee;
            }
        </style>
    </head>
    <body>


<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css" />
<h2>用户列表（ <?php echo $list->total(); ?>） </h2>
<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
ID：<?php echo $user['id']; ?><br/>
昵称：<?php echo $user['nickname']; ?><br/>
邮箱：<?php echo $user['email']; ?><br/>
生日：<?php echo $user['birthday']; ?><br/>
------------------------<br/>
<?php endforeach; endif; else: echo "" ;endif; ?>
<?php echo $list->render(); ?>

        <div class="copyright">
            <a title="官方网站" href="http://www.thinkphp.cn">ThinkPHP</a>
            <span>V5</span>
            <span>{ 十年磨一剑-为API开发设计的高性能框架 }</span>
        </div>
    </body>
</html>
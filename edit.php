<?php
//这个页面是负责编辑（修改）功能的
include "./functions.php";

 //编辑某条留言（数据）就是用新值覆盖其之前的旧值，而这个新值就是本页面post新提交的值

//实现编辑依然还是三大步   引入数据库  修改数据库   保存回数据库

//引入数据库
$data = include './data.php';
//$_GET['i']就表示当前要修改的那条数据的数组键名（下标）  是通过a链接地址栏传参过来的
$id = $_GET['i'];
//只有当用户点击了‘编辑页面’的‘修改留言’按钮之后才允许执行下面的的代码，所以需要if判断数据提交方式
if ( IS_POST ) {
	//修改  将新提交的nickname的值覆盖当前的那条数据中的nickname的值
    //      将新提交的nickname的值覆盖当前的那条数据中的nickname的值
    $data[$id]['nickname']=$_POST['nickname'];
    $data[$id]['content']=$_POST['content'];
	//将修改后的数据保存到数据库文件中
    file_put_contents('./data.php',"<?php return " . var_export($data,true) . ";");
    //同样通过js实现编辑内容提交后自动跳转到主页面
	$str = <<<str
<script>
alert('修改成功');
location.href='./yemian.php';
</script>
str;
	echo $str;

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bt/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="width: 600px">

    <form action="" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            昵称：
            <!--我们要将   要修改的那条数据的内容显示在    编辑页面中，同样nickname和content分开输出在此-->
            <input type="text" name="nickname" class="form-control" value="<?php echo $data[$id]['nickname'] ?>">
        </div>
        <div class="form-group">
            内容：
            <!--textarea 文本域  没有value属性，只需把内容 echo输出在textarea对标签之间即可-->
            <textarea name="content" id="" cols="30" rows="10" class="form-control" ><?php echo $data[$id]['content'] ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">修改留言</button>
        </div>
    </form>
</div>
</body>
</html>

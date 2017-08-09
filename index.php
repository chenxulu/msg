<?php
//这个页面负责   数据的  添加   的功能

//引入含有p函数   及   判断提交方式的IS_POST 的 文件
include './functions.php';

// 实现留言添加的功能  需三大步
//  1.引进数据库文件，把数据库中的数组返回给变量$data（是个数组）
//  2.改变这个变量$data，每点击一次提交，就向数组$data中追加一条数据（追加的数据也是数组，所以$data是二维数组）；
// 3.把追加了数据后的新数组$data 通过var_export($data,true)转化为合法化的代码，再通过file_put_contents 保存回  数据库，当然每次保存回数据库 都是  覆盖掉之前的数据，（如果之前已经有了两条数据，那么此时保存回数据库的$data就是之前的两条加上新提交的一条，这三条去覆盖之前的两条，这样才实现了‘留言’的增加）

//这里是引入数据库，并且用变量$data接收
$data = include './data.php';

//IS_POST 是常量（在页面中任何地方都可以用），是通过三元表达式来赋值的，只有用户点击了‘提交按钮’时，IS_POST的值为true，下面的if语句的判断条件才成立，里面的代码才会执行
if(IS_POST){
	//（用户填写之后）点击‘提交按钮’后，将数据追加到数组$data中
	array_push($data,$_POST);
	//使用var_export将数组变成合法化的字符串，并存放在变量$zifu
	$zifu = var_export($data,true);
	// 数据库文件中 的数据必须是放在 php对标签中的   且必须得有  return ，但每次往数据库保存数据  都会把之前的数据完全覆盖掉（包括php对标签  和  return），所以每次往数据库保存数据时，必须把php对标签和return再传入保存一次
	//将（存放已转为字符串的$data的）变量$zifu  和  每次都要重新补上的php  对标签及‘return’  再放在定界符中，用变量$str接收，方便后面file_put_contents 传参
	$str = <<<str
<?php
return {$zifu};
?>
str;
	//这里是第三大步，将修改后的数组再传入数据库，覆盖掉之前的数据库内容，实现了数据库的更新
	file_put_contents('./data.php',$str);

	//用echo 输出一段js代码，实现每次添加留言后，重新加载当前页面
	$str = <<<str
		<script>
		alert('留言成功');
		location.href='./index01.php';
		</script>
str;
	echo $str;

}
//载入HTML页面结构模板，等同将代码粘贴在此
include './add.php';




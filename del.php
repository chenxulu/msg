<?php
//这个页面是负责实现删除功能的
//删除留言同样是三大步 ①载入数据库②修改数据库③保存回去，覆盖之前的数据库
//删除某条留言，就是删除数组$data中的某个单元，就是删除单个变量，使用unset
/*
 想删除数组中某个值，通过下标（键名）即可
$a = ['a','b','c'];
unset($a[1]);
//此时数组中就只剩下a和c了
*/

include './functions.php';

//引入数据库
$data = include './data.php';
//将点击的‘删除按钮’对应的那条数据删除，点击的按钮（也就是a标签）的序列号应经通过地址栏传参的方式传递过来了，接收地址栏传参用$_GET 其键名为‘i’，将这个值赋给$get,然后将$get作为下标值去删除数组的某一条数据
$get = $_GET['i'];
 unset($data[$get]);

//将改动后的数据保存到数据库文件中，覆盖掉之前的数据
file_put_contents('./data.php',"<?php return " . var_export($data,true) . ";");
//输出一段js代码，实现删除数据后，自动跳转回主页（如果没有下面这段代码，每次点击删除时，会跳转到一个空白页面，因为del.php页面本来就没有html结构，删除完必须手动回到原页面，刷新后才能看到删除的效果）
$str = <<<str
		<script>
		alert('删除成功');
		location.href='./index01.php';
		</script>
str;
echo $str;










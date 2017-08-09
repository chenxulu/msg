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
		<table class="table table-hover">
			<thead>
			<tr>
                <th>榜单</th>
				<!--<th>$k</th>-->
				<th>昵称</th>
				<th>内容</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
                <?php $i = 0; ?>
<!--			<!--我们永远不能确定（数据库的）数组有多少单元，一个单元就是一条留言数据，所以用foreach来循环，$v就是每一条留言数据，同样是一个一维关联数组，一个键名为‘nickname’，一个为‘content’-->
                <?php foreach($data as $k => $v){ ?>
					<!--循环$data时，$data有多少单元，就会创建多少个tr，一个tr就是一行数据-->
                    <tr>
                        <td>
                            <?php
                                $i++;
                                echo $i;
                            ?>
                        </td>
                        <!--<td><?php /*echo $k; */?></td>-->
						<!--将对应的$v['nickname']的值  就是当前$k号的昵称输出在此-->
                        <td><?php echo $v['nickname'] ?></td>
						<!--同理将对应的留言内容输出在此-->
                        <td><?php echo $v['content'] ?></td>
                        <td>
							<!--这个a标签是编辑按钮，所以当点击这个a按钮时，要跳转到‘编辑’的页面，并且要‘告诉编辑页面’我的点击的第几个a按钮，以便据此来修改对应的那条数据！a标签有地址栏传参的功能，同样当前的a标签的序列号就是$k,所以将$k使用php echo在此（不能直接写$k,因为它是php语法中的变量），赋给键名i（i是随便起的名字）-->
                            <a href="" class="btn btn-primary btn-xs">编辑</a>
							<!--同理点击删除按钮时，也需要当前a的序列号-->
                            <a href="" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                <?php } ?>
			</tbody>
		</table>
		<hr>
		<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				昵称：
				<input type="text" name="nickname" class="form-control">
			</div>
			<div class="form-group">
				内容：
				<textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">添加留言</button>
			</div>
		</form>
	</div>
</body>
</html>
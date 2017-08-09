<?php
header('Content-type:text/html;charset=utf-8');
function p($var){
	echo '<pre style="padding: 10px;background: #cccccc">';
	print_r($var);
	echo '</pre>';
}
//IS_POST如果用户提交的时候就是true,否则就是false
define('IS_POST',$_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);
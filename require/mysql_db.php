<?php
$mysqlusername="root"; //连接数据库的用户名
$mysqlpassword="123"; //连接数据库的密码
$database="jiaocai"; //数据库名
$hostname="localhost"; //服务器地址
$link=mysql_connect($hostname,$mysqlusername,$mysqlpassword) or die("Sorry,can not 连接数据库");
mysql_query("set names 'gb2312'");//设置编码

mysql_select_db($database,$link);

/* 取得根目录 */
define('SYS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));
define('File_ROOT', SYS_ROOT."upload/");

//获取第一条记录
//获取第一条记录

function getfirst($sql)
{
	$res=mysql_query($sql);
	$rows=mysql_fetch_array($res);
	return $rows;
}
//返回符合查询条件的总行数
function getcount($sql){
	$res=mysql_query($sql);

return mysql_num_rows($res);
}

?>
<?php
session_start();
include('../require/mysql_db.php');
include('../require/function.php');

$admin_pass=md5($pwd);
$sql="select * from admin where admin_name='$username' and admin_pass='$admin_pass'";
$data=getfirst($sql);
if(empty($data))
{
		echo "<script>alert('用户名密码错误');location.href='login.php';</script>";
		exit;
}
else
	{
		$_SESSION[admin]=$username;
				$_SESSION[ok]=1;

		echo "<script>alert('登录成功');location.href='admin_index.php';</script>";
	}


?>
<?php
$mysqlusername="root"; //�������ݿ���û���
$mysqlpassword="123"; //�������ݿ������
$database="jiaocai"; //���ݿ���
$hostname="localhost"; //��������ַ
$link=mysql_connect($hostname,$mysqlusername,$mysqlpassword) or die("Sorry,can not �������ݿ�");
mysql_query("set names 'gb2312'");//���ñ���

mysql_select_db($database,$link);

/* ȡ�ø�Ŀ¼ */
define('SYS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));
define('File_ROOT', SYS_ROOT."upload/");

//��ȡ��һ����¼
//��ȡ��һ����¼

function getfirst($sql)
{
	$res=mysql_query($sql);
	$rows=mysql_fetch_array($res);
	return $rows;
}
//���ط��ϲ�ѯ������������
function getcount($sql){
	$res=mysql_query($sql);

return mysql_num_rows($res);
}

?>
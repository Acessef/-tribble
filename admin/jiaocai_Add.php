<?
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>系统</title>
<link rel="stylesheet" type="text/css" href="images/admincp.css"></head>

<body>
 <? require ("header.php");
  if($id!="")
	{//取出jiaocai表数据用于修改
	$sql="select * from jiaocai where id=$id";
	$result=mysql_query($sql);
	$data=mysql_fetch_array($result);
	}
  if($act=="save")
{
		if($id!="")
		{
$sql="update jiaocai set jcbianhao='$jcbianhao',jcming='$jcming',zuozhe='$zuozhe',cbshe='$cbshe',banben='$banben' where id=$id";
$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('修改成功');location.href='jiaocai.php';</script>";
	exit;
	}
	else
	{
	exit ("修改失败了");
	}
		}
	if($id=="")
	{
	$sql="select * from jiaocai where jcbianhao='$jcbianhao'";
	$res=mysql_query($sql);
	$rdata=mysql_fetch_array($res);
	if($rdata!=false)
	{
		echo "<script>alert('教材编号已经存在'),history.back()</script>";
		exit;
	}


	$sql="insert into jiaocai (jcbianhao,jcming,zuozhe,cbshe,banben) values ('$jcbianhao','$jcming','$zuozhe','$cbshe','$banben')";
$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('添加成功');location.href='jiaocai.php';</script>";
	exit;
	}
	else
	{
	exit("添加失败了");
	}
	}
}


  ?>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr>
    <td height="19" colspan="4" class="title"><div align="center" class="title"> 教材添加</div></td>
  </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 教材编号：</td>
<td align="left"><input name="jcbianhao" type="text" id="jcbianhao" size="20" value=<?=$data[jcbianhao]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 教材名：</td>
<td align="left"><input name="jcming" type="text" id="jcming" size="20" value=<?=$data[jcming]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 教材作者：</td>
<td align="left"><input name="zuozhe" type="text" id="zuozhe" size="20" value=<?=$data[zuozhe]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">教材出版社：</td>
<td align="left"><input name="cbshe" type="text" id="cbshe" size="20" value=<?=$data[cbshe]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">教材版本号：</td>
<td align="left"><input name="banben" type="text" id="banben" size="20" value=<?=$data[banben]?>></td>
</tr><tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="保存">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>
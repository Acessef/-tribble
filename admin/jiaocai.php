<?
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>=ϵͳ</title><link rel="stylesheet" type="text/css" href="images/admincp.css">

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <? require ("header.php") ?>
<div id="top_banner" class="layout"></div>
<div id="content" class="layout">
  <?
  if($act=="del")
{
	$sql="delete from jiaocai where id=$id";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>alert('ɾ���ɹ�');location.href='jiaocai.php';</script>";
		exit;
	}
	else
	{
	exit("ɾ��ʧ����");

	}
}
?>

  <div id="right">
    <div class="right_title">
      <h2></h2>
    </div><div class="right_body">
  <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#E7F3FB">
          <tr>
            <td align="center" valign="bottom">�̲Ĺ��� <a href="jiaocai_Add.php">�̲����</a></td>


          </tr>
		  </table>
		    <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#E7F3FB">

          <tr>
            <td width="12%" align="center" valign="bottom">�̲ı��</td>
            <td width="12%" align="center" valign="bottom">�̲���</td>
            <td width="12%" align="center" valign="bottom">����</td>
            <td width="12%" align="center" valign="bottom">������</td>
            <td width="12%" align="center" valign="bottom">�޸�</td>
            <td width="12%" align="center" valign="bottom">ɾ��</td>
          </tr>

        </tr>
<?php
$sql="select * from jiaocai ";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result))
	{
?>
         <tr>
              <td align="center" valign="bottom"><?php echo $rs['jcbianhao']; ?></td>
              <td align="center" valign="bottom"><?php echo $rs['jcming']; ?></td>
              <td align="center" valign="bottom"><?php echo $rs['zuozhe']; ?></td>
              <td align="center"><?php echo $rs['cbshe']; ?></td>
              <td align="center" valign="bottom"><a href="jiaocai_add.php?id=<?php echo $rs['id']; ?>">�޸�</a></td>
              <td align="center" valign="bottom"><a href="?id=<?php echo $rs['id']; ?>&act=del">ɾ��</a></td>
            </tr>
<?php
}
?>


      </table>
	  <br>

	<div class="clear"></div>
</div>

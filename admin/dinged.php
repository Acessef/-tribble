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
 <? require ("header.php");
 if($act=="do")
{
	$sql="update zhengding set states=1 where id=$id";

	mysql_query($sql);
}

 ?>
<div id="top_banner" class="layout"></div>
<div id="content" class="layout">


  <div id="right">
    <div class="right_title">
      <h2></h2>
    </div><div class="right_body">
  <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#E7F3FB">
          <tr>
            <td align="center" valign="bottom">�������̲� </td>


          </tr>
		  </table>
		    <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#E7F3FB">
 <tr>
           <td width="12%" align="center" valign="bottom">������</td>

          <td width="12%" align="center" valign="bottom">�̲ı��</td>
          <td width="12%" align="center" valign="bottom">�̲���</td>
	 <td width="12%" align="center" valign="bottom">�ܼ�</td>

          <td width="12%" align="center" valign="bottom">��������</td>
          <td width="12%" align="center" valign="bottom">����ʱ��</td>
          <td width="12%" align="center" valign="bottom">״̬</td>
		            <td width="12%" align="center" valign="bottom">����</td>

        </tr>

        </tr>
<?php
$sql="select * from zhengding where  tui=0 order by id DESC";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result))
	{
		$sql="select * from ruku where jcbianhao='$rs[jcbianhao]'";
		//echo $sql;
		$data=getfirst($sql);
		$total=$rs[zdshuliang]*$data[sgjia];
		if($rs[states]==0) $b="δ����";
else
	$b="�Ѵ���";
?>
          <tr>
		  <td align="center" valign="bottom"><?php echo $rs['dingdan']; ?></td>
            <td align="center" valign="bottom"><?php echo $rs['jcbianhao']; ?></td>
            <td align="center" valign="bottom"><?php echo $rs['jcming']; ?></td>

			            <td align="center" valign="bottom"><?php echo $total; ?></td>


            <td align="center"><?php echo $rs['zdshuliang']; ?></td>
            <td align="center" valign="bottom"><?php echo $rs['shijian']; ?></td>
            <td align="center" valign="bottom"><?=$b?></td>
	<td align="center" valign="bottom"><a href="?act=do&id=<?=$rs[id]?>">����Ԥ��</a></td>

          </tr>
<?php
}
?>


      </table>
	  <br>

	<div class="clear"></div>
</div>

<?
session_start();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>系统</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <? require ("header.php") ?>
<div id="top_banner" class="layout">

</div>
<div id="content" class="layout">
  <?
if ($act=="del")
{
$sql="delete from admin where admin_name='$id'";
$result=mysql_query($sql);

}

  ?>

  <div id="right">
    <div class="right_title">
      <h2></h2>
    </div>

    <div class="right_body">

 <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="3"  class="optiontitle">管理员列表</td>
        </tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td width="15%">帐号</td>
          <td width="25%">管理员名称</td>
          <td width="20%">操作 </td>
        </tr>

<?php
$sql="select * from admin ";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result))
	{
?>
        <tr align='center' bgcolor='#FFFFFF' onmouseover='this.style.background="#F2FDFF"' onmouseout='this.style.background="#FFFFFF"'>
		  <td width="5%"><?=$rs["admin_name"]?></td>
          <td align='left' ><?=$rs["realname"]?></td>
          <td align='center'>


          <a href="javascript:DoEmpty('?act=del&id=<?=$rs["admin_name"]?>')">删除</a>
         </a></td>
        </tr>
<?php
}
?>


      </table>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!--#include file="footer.php"-->
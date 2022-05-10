<?
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>系统</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <? require ("header.php") ?>
<div id="top_banner" class="layout"><script language="JavaScript">
function check()
{


		  if (document.add.xuehao.value=="")
     {
      alert("请填写登录帐号！");
      document.add.xuehao.focus();
      document.add.xuehao.select();
      return false;
     }

	 if (document.add.name.value=="")
     {
      alert("填写用户的真实姓名！");
      document.add.name.focus();
      document.add.name.select();
      return false;
     }
	  if (document.add.banji.value=="")
     {
      alert("填写班级名称！");
      document.add.banji.focus();
      document.add.banji.select();
      return false;
     }
  if (document.add.intro.value=="")
     {
      alert("请填写用户介绍！");
      document.add.intro.focus();
      document.add.intro.select();
      return false;
     }



    // document.add.submit();
}
</script>
</div>
<div id="content" class="layout">
  <?
	$sql="select * from student where xuehao='$xuehao'";
	$res=mysql_query($sql);
	$rs=mysql_fetch_array($res);
  if($act=="add")
{
$sql="update student set name='$name' ,pwd='$password',banji='$banji',intro='$intro' where xuehao='$xuehao'";
if(mysql_query($sql))
die("<script language=javascript>
alert( \"恭喜,修改成功!\"  );
location.href = \"stu.php\"
</script>");
}

  ?>

  <div id="right">
    <div class="right_title">
      <h2></h2>
    </div>

    <div class="right_body">

      <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <form name="add" method="post" action="?act=add" onSubmit="return check()">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">添加用户</td>
        </tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 登录帐号：</td>
		  <td align='left'><input name="xuehao" type="text" id="xuehao" size="30" value="<?=$rs[xuehao]?>" readonly>不可修改</td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 登录密码：</td>
		  <td align='left'><input name="password" type="text" id="password" size="30" value="<?=$rs[pwd]?>">默认123456</td>
		</tr>

		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 用户姓名：</td>
		  <td align='left'><input name="name" type="text" id="name" size="30" value="<?=$rs[name]?>"></td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'>所在班级：</td>
		  <td align='left'> <select name="banji" id="banji">
			<?php
			$res=mysql_query("select * from banji");
			while($b=mysql_fetch_array($res))
			echo "<option value=\"$b[id]\">$b[name]</option>";
			?>
	        </select></td>
		</tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right">用户介绍：</td>
          <td align="left"><textarea id="content_1" name="intro" cols="50" rows="2" style="width:450px;height:30px;"><?=$rs[intro]?></textarea></td>
        </tr>

        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="修改用户" >
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>

    </div>
  </div>
  <div class="clear"></div>
</div>
<!--#include file="footer.php"-->
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
<div id="top_banner" class="layout"></div>
<div id="content" class="layout">
  <?
  $sql="select * from teacher where tea_name='$tea_name'";
	$res=mysql_query($sql);
	$rs=mysql_fetch_array($res);
  if($act=="add")
{



$sql="update teacher set realname='$realname' ,password='$password',intro='$intro' where tea_name='$tea_name'";

if(mysql_query($sql))
die("<script language=javascript>
alert( \"恭喜,添加成功!\"  );
location.href = \"teacher.php\"
</script>");
}


  ?>
  <div id="right">
    <div class="right_title">
      <h2></h2>
    </div><script language="JavaScript">
function check()
{


		  if (document.add.tea_name.value=="")
     {
      alert("请填写登录帐号！");
      document.add.tea_name.focus();
      document.add.tea_name.select();
      return false;
     }
if (document.add.password.value=="")
     {
      alert("密码不能为空！")
      document.add.password.focus();
      document.add.password.select();
     return false;
     }
	  if (document.add.password.value!=document.add.repassword.value)
     {
      alert("输入的密码不一致！");
      document.add.password.focus();
      document.add.password.select();
       return false;
     }

	 if (document.add.realname.value=="")
     {
      alert("填写教师的真实姓名！");
      document.add.realname.focus();
      document.add.realname.select();
      return false;
     }
  if (document.add.intro.value=="")
     {
      alert("请填写教师介绍！");
      document.add.intro.focus();
      document.add.intro.select();
   return false;
     }



     //document.add.submit();
}
</script>
    <div class="right_body">

      <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <form name="add" method="post" action="?act=add" onSubmit="return check()">
        <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">添加教师</td>
        </tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 登录帐号：</td>
		  <td align='left'><input name="tea_name" type="text" id="tea_name" size="30" value="<?=$rs[tea_name]?>" readonly>不可更改</td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 登录密码：</td>
		  <td align='left'><input name="password" type="text" id="password" size="30" value="<?=$rs[password]?>"></td>
		</tr>

		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> 教师姓名：</td>
		  <td align='left'><input name="realname" type="text" id="realname" size="30" value="<?=$rs[realname]?>"></td>
		</tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right">教师介绍：</td>
          <td align="left"><textarea id="content_1" name="intro" cols="50" rows="2" style="width:450px;height:100px;"><?=$rs[intro]?></textarea></td>
        </tr>

        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="修改教师" >
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
    </div>
  </div>
  <div class="clear"></div>
</div>

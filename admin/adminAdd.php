<?
session_start();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ݿ�ԭ��Ӧ������ѧϰϵͳ</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <? require ("header.php") ?>
<div id="top_banner" class="layout">
<script language="JavaScript">
function check()
{
  if (document.add.admin_name.value=="")
     {
      alert("����д����Ա���ƣ�")
      document.add.admin_name.focus()
      document.add.admin_name.select()
      return
     }

 if (document.add.password.value=="")
     {
      alert("���벻��Ϊ�գ�")
      document.add.password.focus();
      document.add.password.select();
      return false;
     }
	  if (document.add.password.value!=document.add.repassword.value)
     {
      alert("��������벻һ�£�");
      document.add.password.focus();
      document.add.password.select();
      return false;
     }
 if (document.add.realname.value=="")
     {
      alert("��д��ʵ������");
      document.add.realname.focus();
      document.add.realname.select();
      return false;
     }
     //document.add.submit()
}
</script>
</div>
<div id="content" class="layout">
  <?
if($act=="add")
{$password=md5($password);
	$sql="insert into admin (admin_name,admin_pass,realname) values ('$admin_name','$password','$realname')";
if(mysql_query($sql))
die("<script language=javascript>
alert( \"��ϲ,��ӳɹ�!\"  );
location.href = \"admin.php\"
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
          <td colspan="2"  class="optiontitle">��ӹ���Ա</td>
        </tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ����Ա���ƣ�</td>
		  <td align='left'><input name="admin_name" type="text" id="admin_name" size="50"></td>
		</tr>
       <tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ��¼���룺</td>
		  <td align='left'><input name="password" type="password" id="password" size="30"></td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ȷ�����룺</td>
		  <td align='left'><input name="repassword" type="password" id="repassword" size="30"></td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ����Ա������</td>
		  <td align='left'><input name="realname" type="text" id="realname" size="30"></td>
		</tr>
        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="�ύ">
          	<input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>

    </div>
  </div>
  <div class="clear"></div>
</div>

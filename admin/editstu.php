<?
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ϵͳ</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <? require ("header.php") ?>
<div id="top_banner" class="layout"><script language="JavaScript">
function check()
{


		  if (document.add.xuehao.value=="")
     {
      alert("����д��¼�ʺţ�");
      document.add.xuehao.focus();
      document.add.xuehao.select();
      return false;
     }

	 if (document.add.name.value=="")
     {
      alert("��д�û�����ʵ������");
      document.add.name.focus();
      document.add.name.select();
      return false;
     }
	  if (document.add.banji.value=="")
     {
      alert("��д�༶���ƣ�");
      document.add.banji.focus();
      document.add.banji.select();
      return false;
     }
  if (document.add.intro.value=="")
     {
      alert("����д�û����ܣ�");
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
alert( \"��ϲ,�޸ĳɹ�!\"  );
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
          <td colspan="2"  class="optiontitle">����û�</td>
        </tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ��¼�ʺţ�</td>
		  <td align='left'><input name="xuehao" type="text" id="xuehao" size="30" value="<?=$rs[xuehao]?>" readonly>�����޸�</td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> ��¼���룺</td>
		  <td align='left'><input name="password" type="text" id="password" size="30" value="<?=$rs[pwd]?>">Ĭ��123456</td>
		</tr>

		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'> �û�������</td>
		  <td align='left'><input name="name" type="text" id="name" size="30" value="<?=$rs[name]?>"></td>
		</tr>
		<tr align='center' bgcolor='#F2FDFF'>
		  <td align='right'>���ڰ༶��</td>
		  <td align='left'> <select name="banji" id="banji">
			<?php
			$res=mysql_query("select * from banji");
			while($b=mysql_fetch_array($res))
			echo "<option value=\"$b[id]\">$b[name]</option>";
			?>
	        </select></td>
		</tr>
        <tr align="center" bgcolor="#FFFFFF">
          <td width="10%" align="right">�û����ܣ�</td>
          <td align="left"><textarea id="content_1" name="intro" cols="50" rows="2" style="width:450px;height:30px;"><?=$rs[intro]?></textarea></td>
        </tr>

        <tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="�޸��û�" >
          	<input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>

    </div>
  </div>
  <div class="clear"></div>
</div>
<!--#include file="footer.php"-->
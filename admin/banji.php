<?php
session_start();
require("header.php");
if($act=="Del")
{
$sql="delete from banji where id=$id";
$result=mysql_query($sql);

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>banji管理</title>
<link rel="stylesheet" type="text/css" href="images/admincp.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

</head>

<body topmargin="0" leftmargin="0" bottommargin="0">




<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="30" bgcolor="#E7F3FB"><div align="center" >班级管理</div></td>
  </tr>
  <tr>
    <td  bgcolor="#E7F3FB"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
$sql="select * from banji";
$result=mysql_query($sql);

	   ?>
	   <tr>
          <td width="224" height="20" bgcolor="#FFFFFF"><div align="center">班级名称</div></td>



 <td width="75" bgcolor="#FFFFFF"><div align="center">页面操作</div></td>
        </tr>
       <?php
	      while($banji=mysql_fetch_array($result))
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $banji[name];?></div></td>

           <td height="20" bgcolor="#FFFFFF"><div align="center">
<a href="?id=<?=$banji[id]?>&act=Del">删除</a>

          </div></td>
        </tr>
		<?php
	        }

		?>
    </table></td>
  </tr>
</table>
<?php
if($act=="save")
{
 $sql="insert into banji (name) values ('$p0')";
 if(mysql_query($sql))
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=banji.php\">";
 else
	 echo "添加失败";
}

?><p>
<div align="center">
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
    <form name="form1" method="post" action="?act=save" onSubmit="return chkinput(this)">
	<tr>
      <td height="30" bgcolor="#E7F3FB"><div align="center" >添加班级</div></td>
    </tr>
    <tr>
      <td bgcolor="#E7F3FB"><table width="780" border="0" align="center" cellpadding="0" cellspacing="1">


        <tr>
          <td height="25" bgcolor="#FFFFFF"><div align="center">班级名称</div></td>
          <td bgcolor="#FFFFFF"><div align="left"><input type="text" name="p0" class="inputcss" size="20"></div></td>
          </tr>
           <tr>

          </tr>








      </table>
	  </td>
    </tr>
     <tr>
      <td height="20"><div align="center" ><input type="submit" value="添加班级" class="buttoncss">&nbsp;</div></td>
    </tr>
	</form>
  </table>
</p>
<p>&nbsp;</p>
</form>
</body>
</html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理系统</title>
<link href="Images/css1/left_css.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
}
}
</SCRIPT>
<body bgcolor="16ACFF">
<table width="98%" border="0" cellpadding="0" cellspacing="0" background="Images/tablemde.jpg">
  <tr>
    <td height="5" background="Images/tableline_top.jpg" bgcolor="#16ACFF"></td>
  </tr>
  <tr>
    <td><TABLE width="97%"
border=0 align=right cellPadding=0 cellSpacing=0 class=leftframetable>
      <TBODY>
        <TR>
          <TD height="25" style="background:url(Images/left_tt.gif) no-repeat">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <TD width="20"></TD>
          <TD class=STYLE1 style="CURSOR: hand" onclick=showsubmenu(1); height=25>管理员模块</TD>
              </tr>
            </table>            </TD>
          </TR>
        <TR>
          <TD><TABLE id=submenu1 cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>

					<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="banji.php"
            target=main>班级管理</A></TD>
                </TR>
	<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="stuAdd.php"
            target=main>添加用户</A></TD>
                </TR>
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="stu.php"
            target=main>用户管理</A></TD>
                </TR>
               <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="dinged.php"
            target=main>已征订教材管理</A></TD>
                </TR>
                <TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="jiaofei.php"
            target=main>用户缴费信息处理</A></TD>
                </TR>
					<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="adminAdd.php"
            target=main>添加管理员</A></TD>
                </TR>
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="admin.php"
            target=main>管理员管理</A></TD>
                </TR>
				<TR>
                  <TD width="2%"><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="jiaocai.php"
            target=main>教材管理</A></TD>
                </TR>
                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="ruku.php"
            target=main>教材入库</A></TD>
                </TR>
                <TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="rukued.php"
            target=main>已入库教材管理</A> </TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="tui.php"
            target=main>教材退货处理</A> </TD>
                </TR>
				<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="tongji.php"
            target=main>教材费用统计打印</A> </TD>
                </TR>
<TR>
                  <TD><IMG src="Images/closed.gif"></TD>
                  <TD height=23><A href="logout.php"
            target=main>退出系统</A> </TD>
                </TR>

              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>



  <tr>
    <td height="5" background="Images/tableline_bottom.jpg"></td>
  </tr>
</table>
</body></html>

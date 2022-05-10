<?php
function get_name($id,$table)
{
	$res=getfirst("select * from $table where id=$id");
	return $res[name];
}
function getshiyan($id)
{
$res=getfirst("select * from shiyan where id=$id");
	return $res[title];
}
//遍历创建目录
function Remkdir($path) {
	if (!file_exists($path)) {
		Remkdir(dirname($path));
		@mkdir($path, 0777);
	}
}
//获取文件后缀名
function get_extend($file_name)
{
$extend = pathinfo($file_name);
$extend = strtolower($extend["extension"]);
return $extend;
}
//文件上传实现

function upload_file($inputname, $file=null)
{
	$year = date('Y'); $day = date('md');
	$z = $_FILES[$inputname];
	//print_r($z);
	//exit;
	if($file==null)
	{

	$file_ext=get_extend($z['name']);
//echo $file_ext;
//exit;

	}
	$n = time().rand(1000,9999).".".$file_ext;
	if ($z &&  $z['error']==0) {
		if (!$file) {
			Remkdir( File_ROOT . '/' . "{$year}/{$day}" );
			$file = "{$year}/{$day}/{$n}";
			$path = File_ROOT . '/' . $file;

		} else {
			Remkdir( dirname(File_ROOT.'/' .$file) );
			$path = File_ROOT . '/' .$file;
		}
//echo $path ;


			move_uploaded_file($z['tmp_name'], $path);

		//echo $file;exit;
		return $file;
	}
	return $file;
}
/*验证输入字符*/
function SafeHtml($msg = "")
{
	if(empty($msg))
	{
		return false;
	}
	$msg = str_replace('&amp;','&',$msg);
	$msg = str_replace('&nbsp;',' ',$msg);
	$msg = str_replace("'","&#39;",$msg);
	$msg = str_replace('"',"&quot;",$msg);
	$msg = str_replace("<","&lt;",$msg);
	$msg = str_replace(">","&gt;",$msg);
	$msg = str_replace("\t","&nbsp; &nbsp; ",$msg);
	$msg = str_replace("\r","",$msg);
	$msg = str_replace("   ","&nbsp; &nbsp;",$msg);
	$msg = preg_replace("/<script(.*?)<\/script>/is","",$msg);
	$msg = preg_replace("/<frame(.*?)>/is","",$msg);
	$msg = preg_replace("/<\/fram(.*?)>/is","",$msg);
	return $msg;
}
/*错误提示*/
function Error($msg="",$url="")
{
	$refererUrl = $url ? $url : ($_SERVER["HTTP_REFERER"] ? $_SERVER["HTTP_REFERER"] : "index.php");
	echo "<br /><br /><br /><table width='50%' align='center'><tr><td style='font:normal 12px 宋体,Tahoma,Arial;text-align:center;color:#000000;background:#ffffff;border:1px #D4D4D4 solid;padding:10px'>".$msg."<br /><br /><a href='".$refererUrl."'>点击返回</a></td></tr></table>";
	die();
	return true;
}
/*截取字符长度，，一汉字相当于2个字符*/
function CutString($string, $length, $dot = '...') {
	#global $charset;
	#[设置变量]
	$charset = "gb2312";

	if(strlen($string) <= $length)
	{
		return $string;
	}

	$strcut = '';
	if(strtolower($charset) == 'gb2312')
	{
		$n = $tn = $noc = 0;
		while ($n < strlen($string))
		{
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126))
			{
				$tn = 1; $n++; $noc++;
			}
			elseif(194 <= $t && $t <= 223)
			{
				$tn = 2; $n += 2; $noc += 2;
			}
			elseif(224 <= $t && $t < 239)
			{
				$tn = 3; $n += 3; $noc += 2;
			}
			elseif(240 <= $t && $t <= 247)
			{
				$tn = 4; $n += 4; $noc += 2;
			}
			elseif(248 <= $t && $t <= 251)
			{
				$tn = 5; $n += 5; $noc += 2;
			}
			elseif($t == 252 || $t == 253)
			{
				$tn = 6; $n += 6; $noc += 2;
			}
			else
			{
				$n++;
			}

			if ($noc >= $length)
			{
				break;
			}

		}
		if ($noc > $length)
		{
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	}
	else
	{
		for($i = 0; $i < $length - 3; $i++)
		{
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	return $strcut.$dot;
}
//取得IP地址
function getip() {
		if (getenv("HTTP_X_FORWARDED_FOR")) {
			$realip = getenv( "HTTP_X_FORWARDED_FOR");
		} elseif (getenv("HTTP_CLIENT_IP")) {
			$realip = getenv("HTTP_CLIENT_IP");
		} else {
			$realip = getenv("REMOTE_ADDR");
		}
	$iphide=explode(".",$realip);
	$realip="$iphide[0].$iphide[1].$iphide[2].$iphide[3]";
	return $realip;
}

?>

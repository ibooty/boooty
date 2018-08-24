<?php
	ob_start();
	session_start();
	require("data.php");
?>

<?php
	$id=$_GET["id"];
	$sql="select * from xxxurl where id=".$id;
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<?php
		$sql="update xxxurl set hits=hits+1 where id=$id";
		mysql_query($sql);
?>
<?php 
$password = "2018"; // 这里是密码 
$p = ""; 
if(isset($_COOKIE["isview"]) and $_COOKIE["isview"] == $password){ 
$isview = true; 
}else{ 
if(isset($_POST["pwd"])){ 
if($_POST["pwd"] == $password){ 
setcookie("isview",$_POST["pwd"],time()+3600*168); 
$isview = true; 
}else{ 
$p = (empty($_POST["pwd"])) ? "需要密码才能查看，请输入密码。" : "密码不正确”。"; 
} 
}else{ 
$isview = false; 
$p = "获取密码”。"; 
} 
} 
if($isview){ ?> 


<br>
<a href="<?php echo $rows["url"]?>"><?php echo $rows["url"]?> </a> &gt;  &gt;  &gt; 浏览：<?php echo $rows["hits"]?> &gt; 好评：<?php echo $rows["love"]?> &gt; 差评<?php echo $rows["hate"]?>&gt;  &gt;  &gt; 
<a href="love.php?id=<?php echo $rows["id"]?>">好评</a> &gt;  &gt;  &gt; 
<a href="hate.php?id=<?php echo $rows["id"]?>">差评</a>
<br>


<?php }else{ ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="pragma" content="no-cache" /> 
<meta http-equiv="cache-control" content="no-cache" /> 
<meta http-equiv="expires" content="0" /> 
<title>电影下载地址</title> 
<!--[if lt IE 6]> 
<style type="text/css"> 
.z3_ie_fix{ 
float:left; 
} 
</style> 
<![endif]--> 
<style type="text/css"> 
<!-- 
body{ 
background:none; 
} 
.passport{ 
border:1px solid red; 
background-color:#FFFFCC; 
width:560px; 
height:360px; 
position:absolute; 
left:30.0%; 
top:30.0%; 
margin-left:-5px; 
margin-top:-5px; 
font-size:14px; 
text-align:center; 
line-height:30px; 
color:#746A6A; 
} 
--> 
</style> 
<div class="passport"> 
<div style="padding-top:10px;"> 
<form action="?yes" method="post" style="margin:0px;">输入查看密码 
<input type="password" name="pwd" /> <input type="submit" value="查看" /> 
</form> 
<?php echo $p; ?> 
</div> 
</div> 
<?php 
} ?> 
</body> 
</html> 
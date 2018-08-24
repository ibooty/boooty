<?php
	ob_start();
	session_start();
	require("data.php");
?>

<?php
		$url=$_POST["url"];
		$mysql = 'select * from xxxurl where url=$url';
$res = mysql_query($mysql);
if(mysql_num_rows($res)){ //查询表中有多少行
echo '<script type="text/javascript">alert(“已存在”);location.href="链接到你刚才的页面";</script>';
}else{
$sql="insert into xxxurl(url,love,hate,hits) values ('$url','1','1','1')";
}
		mysql_query($sql);
		header("location:index.php");
?>

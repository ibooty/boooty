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
		$sql="update xxxurl set love=love-1 where id=$id";
		mysql_query($sql);
?>

<?php
echo "<script>alert('差评成功!');history.back();</script>";
?>
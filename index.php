<?php
	ob_start();
	session_start();
	require("data.php");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>网站列表</title>
<meta name="Keywords" content="微博视频下载,微博视频解析,秒拍视频下载,秒拍视频解析,如何下载微博视频,怎么下载微博视频">
<meta name="Description" content="微博视频下载,微博视频解析,秒拍视频下载,秒拍视频解析">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="css/base.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
	<div class="container">

		<div id="logo" class="row">
			<div class="col-xs-12">
				<a href="#"><img src="css/logo.png" alt="微博视频下载"></a>
			</div>	
		</div>


<form action="add.php" method="post">
		<div id="post" class="row">
			<div class="col-xs-12">
				<div class="input-group">

				 
				 
				<input type="text" name="url" class="form-control input-lg" placeholder="输入地址，如：http://www.baidu.com"/>
				<span class="input-group-btn"><input type="submit" value="提交" class="btn btn-primary input-lg "/></span>
				
				
				</div>	
			</div>	
		</div>
</form>


		


		<div id="ad" class="row">
			<div class="col-xs-12">
<!--这里是广告位置 --->
			</div>
		</div>

		

		<div id="show" class="row">
			<div class="col-xs-12">
				<div class="list-group">
				  <a href="https://www.weibovideo.com/#" class="list-group-item active">网站列表</a>
	<?php
		$id=$_GET["id"];
		if($id=="")
			$id=1;
		$pagesize=10;
		$sql="select * from xxxurl order by id DESC";
		$rs=mysql_query($sql);
		$recordcount=mysql_num_rows($rs);
		$pagecount=($recordcount-1)/$pagesize+1;
		$pagecount=(int)$pagecount;
		$pages=$_GET["pages"];
		if($pages=="")
			$pages=1;
		$startno=($pages-1)*$pagesize;
		$sql="select * from xxxurl order by love DESC limit $startno,$pagesize";
		$rs=mysql_query($sql);
	?>


<?php
 while($rows=mysql_fetch_assoc($rs))
 {
?>	
				  <a href="go.php?id=<?php echo $rows["id"]?>" class="list-group-item" target="_blank"><?php echo $rows["url"]?><span class="badge">好评：<?php echo $rows["love"]?></span><span class="badge">差评：<?php echo $rows["hate"]?></span><span class="badge">浏览：<?php echo $rows["hits"]?></span></a>
<?php
 }
?>	
				  
				</div>
			</div>	
		</div>
		
		
		<div id="notice" class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
				  <div class="panel-heading">网站列表</div>
					  <div class="panel-body">
							<a href="index.php?pages=<?php echo $pages-1?>"> &lt; </a>
							<a class="Pagecurt" href="index.php?pages=1">首页</a>
							<a href="index.php?pages=<?php echo $pages?>"><?php echo $pages?></a>
							<a href="index.php?pages=<?php echo $pages+1?>"><?php echo $pages+1?></a>
							<a href="index.php?pages=<?php echo $pages+2?>"><?php echo $pages+2?></a>
							<a href="index.php?pages=<?php echo $pages+3?>"><?php echo $pages+3?></a>
							<a href="index.php?pages=<?php echo $pages+4?>"><?php echo $pages+4?></a>
							<a href="index.php?pages=<?php echo $pages+5?>"><?php echo $pages+5?></a>
							<span>...</span>
							<a href="index.php?pages=<?php echo $pagecount?>"><?php echo $pagecount?></a>
							<a href="index.php?pages=<?php echo $pages+1?>"> &gt; </a>
					  </div>
				</div>	
				
			</div>	
		</div>
		
		<div id="footer" class="row">
			<div class="col-xs-12">
				<p><br>Copyright © 2015-2018 Hitu.Org</p>
					<div style="display:none;">
						<统计>
			    </div>
				<p></p>
			</div>
		</div>


	</div>   
  
</body>
</html>
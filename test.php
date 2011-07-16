<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/_includes/rssreader.php'; 
	include $_SERVER['DOCUMENT_ROOT'] . '/_includes/functions.php'; 
	
	$url="http://www.huskers.com/rss.dbml?db_oem_id=100&media=schedulesxml";
  $rss=new rssFeed($url);
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	<h1>Testing xml parse</h1>
	<?php echo cut_down_xml($rss->parse()); ?>
</body>
</html>
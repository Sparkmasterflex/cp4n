<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/_includes/functions.php';
  //include $_SERVER['DOCUMENT_ROOT'] . '/_includes/rssreader.php';
	
	// $url="https://www.google.com/calendar/feeds/eb7e7i2v7simmpf3n145co3000%40group.calendar.google.com/public/basic";
  // $rss=new rssFeed($url);
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Central Pennsylvanians For Nebraska - Big Red in Pennsylvania</title>
  <link rel="stylesheet" type="text/css" href="/stylesheets/reset.css" />
  <link rel="stylesheet" type="text/css" href="/stylesheets/base.css" />
  <link rel="stylesheet" type="text/css" href="/webfontkit/stylesheet.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.3/scriptaculous.js?load=effects"></script>
  <script type="text/javascript" src="/javascripts/application.js"></script>
<?php if($body == 'home') { ?>
  <script type="text/javascript" src="/javascripts/slideshow.js"></script>
<?php } else if($body == 'photos') { ?>
	<script type="text/javascript" src="/javascripts/picasa.js"></script>
	<script type="text/javascript" src="/javascripts/gallery.js"></script>
	<link rel="stylesheet" type="text/css" href="/stylesheets/gallery.css" />
<?php } else if($body == 'alumni_map') {
	$arr = getAllMarkers();
	$script = "<script type=\"text/javascript\">";
	$var_names = array('addresses', 'names', 'comments');
	$i = 0;
	foreach($arr as $attr) {
		$script .= "\nvar " . $var_names[$i] . " = new Array(";
		foreach ($attr as $key => $value){
	    if ($key < (count($attr)-1)){
	      $script = $script . '"' . $value . '",';
	    } else {
	      $script = $script . '"' . $value . "\");";
	    }
		}
		$i++;
	}
	$script .= "\n</script>";
	echo $script;
?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<?php } ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body id="<?=$body?>">
  <div id="body_bg">
  <div id="container">
    <div id="header">
      <div id="logo"  class="hidden">
        <h1 class="floatright"><a href="/">Central Pennsylvanians <span class="small">for</span><span class="large">Nebraska</span></a></h1>
        <h2><a href="/">Nebraska University</a></h2>
      </div>
<?php include '_includes/navigation.php'; ?>
      <div id="headerBar" class="redGradient">
        <div id="nextEvent" class="blackGradient">
          <h4>Our Next Event:</h4>
          <a class="floatright" href="/calendar.php">find out more</a>
          <div class="sunkenBox">
            <p>Say what?!</p>
          </div>
        </div>
      </div>
    </div>
    <div id="content" class="clearfix">

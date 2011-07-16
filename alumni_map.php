<?php
	ini_set('display_errors', 1); 
	ini_set('log_errors', 1); 
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); 
	error_reporting(E_ALL);
	
  $body = 'alumni_map';
	$success = false;
	include '_includes/header.php';
	if($_POST) $success = saveAddress($_POST);
?>
<div class="leftcol">
  <h2 class="photos hidden">Alumni Map</h2>
  <div id="map_canvas"></div>
</div>
<div class="rightcol">
	<?php if($success == false) { ?>
		<h3>Where are you from?</h3>
		<form action="/alumni_map.php" method="post" id="contactForm">
			<label>Name: *<br />
				<input type="text" name=name required />
				<p class="val"><span class="invalid">Please enter a Name</span></p>
			</label>
			<label>Address: *<br />
				<input type="text" name=address required />
				<p class="val"><span class="invalid">Please enter an Address</span></p>
			</label>
			<label>City: *<br />
				<input type="text" name=city required />
				<p class="val"><span class="invalid">Please enter a City</span></p>
			</label>
			<label>State:<br />
				<input type="text" disabled="disabled" value="Nebraska" />
			</label>
			<label>Zip-code: *<br />
				<input type="text" name=zip maxlength="5" required />
				<p class="val<?php if($_POST && $success == false) { echo " error"; } ?>"><span class="invalid">Please enter a valid Zipcode</span></p>
			</label>
			<label>Additional Comments:<br />
				<textarea name=comments rows="7" cols="33"></textarea>
			</label>
			<sub>* indicates a required field</sub>
			<input type="submit" value="Get on the Map!" />
		</form>
	<?php } else { ?>
		<h3>Thank you!</h3>
		<p>Your marker has been created. If you don't see it, please try refreshing the page.</p>
		<p>Please note that all markers and comments are subject to review and may be removed if deemed inappropriate.</p>
	<?php } ?>
</div>
<?php include '_includes/footer.php'; ?>
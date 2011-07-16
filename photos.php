<?php
  $body = 'photos';
	include '_includes/header.php';
?>
<div class="leftcol">
  <h2 class="photos hidden">About Us</h2>
  <div id="ajaxreader"></div>
	<script type="text/javascript">
    picasa.load({
      containerId: 'ajaxreader',
      userName: 'centralpa4ne@gmail.com',
      albumName: 'Website',
      imageSize: 80
    });
	</script>
</div>
<?php
	include '_includes/rightcol.php';
	include '_includes/footer.php';
?>
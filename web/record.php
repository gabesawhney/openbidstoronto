<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Open Bids Toronto</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/openbidstoronto.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

<?php
$haverecord=0;
$url = "http://pwd.ca/openbidstoronto/api.php?cn=".urldecode($_REQUEST['cn']);
$json = file_get_contents($url);
$json = json_decode($json);
if (empty($json->data)) {
	print "no record found";
} else {
	$haverecord=1;
	#var_dump($json->data);
}
?>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row recordheader">
      <div class="twelve columns" style="margin-top: 10%">
        <h1><a href="http://pwd.ca/openbidstoronto/">Open Bids Toronto</a></h1>
        <p>A searchable archive of past City of Toronto bids and tenders.</p>
      </div>
    </div>
    <div class="recorddisplay">
<?php
foreach($json->data as $key => $value) {
	if ( ($key != "parsedtext") && ($key != "urls") && ($key != "lastupdated") && ($key != "uuid") ) {
?>
    <div class="row">
      <div class="three columns"><?=$key?></div>
      <div class="nine columns"><?=$value?></div>      
	</div>
<?
	} elseif ($key == "parsedtext") {
		$parsedtext = $value;
	}
}
?>
    <div class="row">
      <div class="twelve columns"><strong>Attachments:</strong><br/>
      LINKS GO HERE</div>
	</div>
    <div class="row">
      <div class="twelve columns"><strong>Text from attachments:</strong><br/>
      <?=$parsedtext?></div>
	</div>

    </div>
    <div class="footer-section">
      <div class="row">
        <div class="twelve columns">
        <a href="">About</a>
        </div>
      </div>
    </div>
  </div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
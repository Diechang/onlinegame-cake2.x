<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>リダイレクト</title>
<meta http-equiv="refresh" content="0;URL=<?php echo !empty($url) ? $url : "/"?>">
<meta name="robots" content="noindex">
<meta name="robots" content="nofollow">
<meta name="robots" content="noarchive">
</head>

<body>
<?php

	echo $this->element('code_analytics', array("options" => (!empty($options)) ? $options : null));
?>
<?php 
	// debug($this->viewVars);
?>
</body>
</html>

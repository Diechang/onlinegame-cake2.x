<?php
// html5 tags
$config = array(
	'tags' => array(
		'meta' => '<meta%s>',
		'metalink' => '<link href="%s"%s>',
		'input' => '<input name="%s"%s>',
		'hidden' => '<input type="hidden" name="%s"%s>',
		'checkbox' => '<input type="checkbox" name="%s" %s>',
		'checkboxmultiple' => '<input type="checkbox" name="%s[]"%s>',
		'radio' => '<input type="radio" name="%s" id="%s"%s>%s',
		'password' => '<input type="password" name="%s" %s>',
		'file' => '<input type="file" name="%s" %s>',
		'file_no_model' => '<input type="file" name="%s" %s>',
		'submit' => '<input %s>',
		'submitimage' => '<input type="image" src="%s" %s>',
		'image' => '<img src="%s" %s>',
		'tagselfclosing' => '<%s%s>',
		'css' => '<link rel="%s" type="text/css" href="%s" %s>',
		'charset' => '<meta http-equiv="Content-Type" content="text/html; charset=%s">',
	),
	'minimizedAttributes' => array('async')
);
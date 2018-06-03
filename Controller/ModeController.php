<?php
class ModeController extends AppController
{
	function pc()
	{
		pr(Router::parse($this->referer(array("controller" => "pages", "action" => "home", "sp" => false))));
		exit;
		$this->redirect($this->referer(array("sp" => false)));
	}
	function sp()
	{
		pr(Router::parse($this->referer(array("controller" => "pages", "action" => "home", "sp" => true))));
		exit;
		$this->redirect($this->referer(array("sp" => true)));
	}
}
?>
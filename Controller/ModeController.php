<?php
class ModeController extends AppController
{
	function pc()
	{
		$this->Cookie->write("mode", "pc", false);
		$this->redirect("/");
	}
	function sp()
	{
		$this->Cookie->write("mode", "sp", false);
		$this->redirect("/sp/");
	}
	// from sp
	function sp_pc()
	{
		$this->pc();
	}
	function sp_sp()
	{
		$this->sp();
	}
}
?>
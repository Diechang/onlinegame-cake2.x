<?php
class AdRightBottomsController extends AppController
{

	var $name = 'AdRightBottoms';

	function sys_index($public = null)
	{
		$this->AdRightBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adRightBottoms', $this->AdRightBottom->find("all", array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout", "右サイドバー下バナー");
	}

	function sys_add()
	{
		$this->AdBanner->sys_add($this->AdRightBottom);
	}

	function sys_edit($id = null)
	{
		$this->AdBanner->sys_edit($this->AdRightBottom, $id, "右サイドバー下バナー");
	}

	function sys_lump()
	{
		$this->AdBanner->sys_lump($this->AdRightBottom);
	}

	function sys_delete($id = null)
	{
		$this->AdBanner->sys_delete($this->AdRightBottom, $id);
	}
}

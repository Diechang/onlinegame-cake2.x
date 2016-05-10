<?php
class AdLeftBottomsController extends AppController
{

	var $name = 'AdLeftBottoms';
	var $components	= array("AdBanner");

	function sys_index($public = null)
	{
		$this->AdLeftBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adLeftBottoms', $this->AdLeftBottom->find("all", array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout", "左サイドバー下バナー");
	}

	function sys_add()
	{
		$this->AdBanner->sys_add($this->AdLeftBottom);
	}

	function sys_edit($id = null)
	{
		$this->AdBanner->sys_edit($this->AdLeftBottom, $id, "左サイドバー下バナー");
	}

	function sys_lump()
	{
		$this->AdBanner->sys_lump($this->AdLeftBottom);
	}

	function sys_delete($id = null)
	{
		$this->AdBanner->sys_delete($this->AdLeftBottom, $id);
	}
}

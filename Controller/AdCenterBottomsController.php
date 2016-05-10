<?php
class AdCenterBottomsController extends AppController
{

	var $name = 'AdCenterBottoms';
	var $components	= array("AdBanner");

	function sys_index($public = null)
	{
		$this->AdCenterBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adCenterBottoms', $this->AdCenterBottom->find("all", array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout", "中央コンテンツ下バナー");
	}

	function sys_add()
	{
		$this->AdBanner->sys_add($this->AdCenterBottom);
	}

	function sys_edit($id = null)
	{
		$this->AdBanner->sys_edit($this->AdCenterBottom, $id, "中央コンテンツ下バナー");
	}

	function sys_lump()
	{
		$this->AdBanner->sys_lump($this->AdCenterBottom);
	}

	function sys_delete($id = null)
	{
		$this->AdBanner->sys_delete($this->AdCenterBottom, $id);
	}
}

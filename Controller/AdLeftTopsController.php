<?php
class AdLeftTopsController extends AppController {

	var $name = 'AdLeftTops';
	var $components	= array("AdBanner");

	function sys_index($public = null) {
		$this->AdLeftTop->recursive = 0;
		$conditions = ($public == "all") ? null : array("AdLeftTop.public" => 1);
		$this->set('adLeftTops', $this->AdLeftTop->find("all" , array(
			"conditions" => $conditions,
			"fields" => array(
				"AdLeftTop.*",
				"Title.title_official",
			),
			"order" => "id DESC",
		)));
		$this->set("pankuz_for_layout" , "左サイドバー上バナー");
		$this->set("titles" , $this->AdLeftTop->Title->find("list" , array("order" => "Title.title_official")));
	}

	function sys_add() {
		$this->AdBanner->sys_add($this->AdLeftTop);
	}

	function sys_edit($id = null) {
		$this->AdBanner->sys_edit($this->AdLeftTop, $id, "左サイドバー上バナー");
		$titles = $this->AdLeftTop->Title->find('list');
		$this->set(compact('titles'));
	}

	function sys_lump() {
		$this->AdBanner->sys_lump($this->AdLeftTop);
	}

	function sys_delete($id = null) {
		$this->AdBanner->sys_delete($this->AdLeftTop, $id);
	}
}

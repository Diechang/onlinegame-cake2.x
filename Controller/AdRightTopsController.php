<?php
class AdRightTopsController extends AppController {

	var $name = 'AdRightTops';

	function sys_index($public = null) {
		$this->AdRightTop->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adRightTops', $this->AdRightTop->find("all" , array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout" , "右サイドバー上バナー");
	}

	function sys_add() {
		$this->AdBanner->sys_add($this->AdRightTop);
	}

	function sys_edit($id = null) {
		$this->AdBanner->sys_edit($this->AdRightTop, $id, "右サイドバー上バナー");
	}

	function sys_lump() {
		$this->AdBanner->sys_lump($this->AdRightTop);
	}

	function sys_delete($id = null) {
		$this->AdBanner->sys_delete($this->AdRightTop, $id);
	}
}

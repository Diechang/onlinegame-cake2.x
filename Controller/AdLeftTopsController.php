<?php
class AdLeftTopsController extends AppController {

	var $name = 'AdLeftTops';

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

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid ad left top'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('adLeftTop', $this->AdLeftTop->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->AdLeftTop->create();
			if ($this->AdLeftTop->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		return $this->redirect(array('action' => 'index'));
//		$titles = $this->AdLeftTop->Title->find('list');
//		$this->set(compact('titles'));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->AdLeftTop->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->AdLeftTop->read(null, $id);
		}
		$titles = $this->AdLeftTop->Title->find('list');
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout" , array(
			array("str" => "左サイドバー上バナー" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			if ($this->AdLeftTop->saveAll($this->request->data["AdLeftTop"])) {
				$this->Session->setFlash(Configure::read("Success.lump"));
			} else {
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect($this->referer(array('action' => 'index')));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->AdLeftTop->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}

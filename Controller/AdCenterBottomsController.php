<?php
class AdCenterBottomsController extends AppController {

	var $name = 'AdCenterBottoms';

	function sys_index($public = null) {
		$this->AdCenterBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adCenterBottoms', $this->AdCenterBottom->find("all" , array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout" , "中央コンテンツ下バナー");

	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid ad center bottom'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('adCenterBottom', $this->AdCenterBottom->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->AdCenterBottom->create();
			if ($this->AdCenterBottom->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->AdCenterBottom->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->AdCenterBottom->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array(
			array("str" => "中央コンテンツ下バナー" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			if ($this->AdCenterBottom->saveAll($this->request->data["AdCenterBottom"])) {
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
		if ($this->AdCenterBottom->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}

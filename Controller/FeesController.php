<?php
class FeesController extends AppController {

	var $name = 'Fees';

	function sys_index() {
		$this->Fee->recursive = 0;
		$this->set('fees', $this->Fee->find("all"));
		//
		$this->set("pankuz_for_layout" , "料金マスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'fee'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('fee', $this->Fee->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->Fee->create();
			if ($this->Fee->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Fee->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
			$this->Fee->recursive = -1;
			$this->request->data = $this->Fee->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array("料金設定マスタ" , "編集"));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			if ($this->Fee->saveAll($this->request->data["Fee"])) {
				$this->Session->setFlash(Configure::read("Success.lump"));
			} else {
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->Fee->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>
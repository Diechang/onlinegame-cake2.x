<?php
class UpdatesController extends AppController {

	var $name = 'Updates';

	function sys_index() {
		if (!empty($this->request->data)) {
			$this->Update->create();
			if ($this->Update->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		$this->Update->recursive = 0;
		$this->set('updates', $this->Update->find("all" , array("order" => "created DESC")));
		//
		$this->set("pankuz_for_layout" , "更新履歴");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'update'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('update', $this->Update->read(null, $id));
//	}

//	function sys_add() {
//		if (!empty($this->request->data)) {
//			$this->Update->create();
//			if ($this->Update->save($this->request->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved'), 'update'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.'), 'update'));
//			}
//		}
//	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Update->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Error.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Update->read(null, $id);
		}
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "更新履歴" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->Update->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>
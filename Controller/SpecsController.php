<?php
class SpecsController extends AppController {

	var $name		= 'Specs';
	var $components	= array("LumpEdit");

//	function sys_index() {
//		$this->Spec->recursive = 0;
//		$this->set('specs', $this->paginate());
//	}
	/**
	 * Sys
	 */
	function sys_index() {
		$title_id	= !empty($this->request->query["title_id"])	? $this->request->query["title_id"] : null;
		//Spec data
		$this->Spec->recursive = 0;
		$sConditions = (!empty($title_id)) ? array("Spec.title_id" => $title_id) : null;
		$specs = $this->Spec->find("all" , array(
			"conditions" => $sConditions,
			"fields" => array(
				"Spec.*",
				"Title.title_official",
			),
			"order" => "Spec.id DESC"
		));
		//
		//Title data
		$this->Spec->Title->unbindAll(array("Spec") , false);
		$tConditions = (!empty($title_id)) ? array("Title.id" => $title_id) : null;
		$titles = $this->Spec->Title->find("list" , array(
			"conditions" => $tConditions,
			"order" => "Title.title_official",
		));
		$titlesCount =$this->Spec->Title->find("all" , array(
			"conditions" => $tConditions,
			"fields" => array(
				"Title.id",
				"Title.title_official",
			),
			"order" => "Title.title_official",
		));
		//
		$this->set(compact("specs", "titles", "titlesCount"));
		//
		if(!empty($title_id))
		{
			$this->set("pankuz_for_layout" , array(
				array("str" => "動作環境一覧" , "url" => array("action" => "index")),
				$this->Spec->Title->field("title_official" , array("Title.id" => $title_id)),
			));
			// $this->set("title_id" , $title_id);
		}
		else
		{
			$this->set("pankuz_for_layout" , "動作環境一覧");
			// $this->set("title_id" , null);
		}
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'spec'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('spec', $this->Spec->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->Spec->create();
			if ($this->Spec->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index' , "?" => array("title_id" => $this->request->data["Spec"]["title_id"])));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		$titles = $this->Spec->Title->find('list');
		//
		$this->set("titles", $titles);
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Spec->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index' , "?" => array("title_id" => $this->request->data["Spec"]["title_id"])));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Spec->read(null, $id);
		}
		//
		$titles = $this->Spec->Title->find('list');
		$this->set("titles" , $titles);
		$this->set("pankuz_for_layout" , array(
			array("str" => "動作環境一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Spec"] , $this->Spec))
			{
//				pr($this->request->data["Spec"]);
//				exit;
				if ($this->Spec->saveAll($this->request->data["Spec"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
				} else {
					$this->Session->setFlash(Configure::read("Error.lump"));
					return $this->redirect($this->referer(array('action' => 'index')));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_copy($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Spec->recursive = -1;
		$this->request->data = $this->Spec->read(null , $id);
//		pr($this->request->data);
//		exit;
		unset($this->request->data["Spec"]["id"]);
		$this->Spec->create();
		if ($this->Spec->save($this->request->data)) {
			$this->Session->setFlash(Configure::read("Success.copy"));
			return $this->redirect(array('action' => 'index' , $this->request->data["Spec"]["title_id"]));
		}
		$this->Session->setFlash(Configure::read("Error.copy"));
		return $this->redirect(array('action' => 'index'));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if ($this->Spec->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>
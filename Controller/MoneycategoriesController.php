<?php
class MoneycategoriesController extends AppController
{

	var $name = 'Moneycategories';

	function sys_index()
	{
		$this->Moneycategory->recursive = 0;
		$this->set('moneycategories', $this->Moneycategory->find("all"));
		//
		$this->set("pankuz_for_layout", "小遣いカテゴリ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//		{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'moneycategory'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('moneycategory', $this->Moneycategory->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Moneycategory->create();
			if($this->Moneycategory->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
				return $this->redirect(array("action" => "index"));
			}
		}
		else
		{
			return $this->redirect(array("action" => "index"));
		}
	}

	function sys_edit($id = null)
	{
		if(!$id && empty($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if(!empty($this->request->data))
		{
			if($this->Moneycategory->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if(empty($this->request->data))
		{
			$this->request->data = $this->Moneycategory->read(null, $id);
		}
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "小遣いカテゴリ", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			if($this->Moneycategory->saveAll($this->request->data["Moneycategory"]))
			{
				$this->Session->setFlash(Configure::read("Success.lump"));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if($this->Moneycategory->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>
<?php
/*
 * 広告バナーコンポーネント
 */
class AdBannerComponent extends Component
{
	var $name	= "AdBanner";
	var $controller;
	
/**
 * initialize
 * 
 * @param	Controller	controller
 */
	function initialize(Controller $controller)
	{
		$this->controller =& $controller;
	}

/**
 * add
 * 
 * @param	Model	$model
 * @access	public
 */
	function sys_add(&$model)
	{
		if(!empty($this->controller->request->data))
		{
			$model->create();
			if($model->save($this->controller->request->data))
			{
				$this->controller->Session->setFlash(Configure::read("Success.create"));
			}
			else
			{
				$this->controller->Session->setFlash(Configure::read("Error.input"));
			}
		}
		return $this->controller->redirect(array('action' => 'index'));
	}

/**
 * edit
 * 
 * @param	Model	$model
 * @param	number	$id
 * @param	title	$title
 * @access	public
 */
	function sys_edit(&$model, &$id, $title)
	{
		if(!$id && empty($this->controller->request->data))
		{
			$this->controller->Session->setFlash(Configure::read("Error.id"));
			return $this->controller->redirect(array('action' => 'index'));
		}
		if(!empty($this->controller->request->data))
		{
			if($model->save($this->controller->request->data))
			{
				$this->controller->Session->setFlash(Configure::read("Success.modify"));
				return $this->controller->redirect(array('action' => 'index'));
			}
			else
			{
				$this->controller->Session->setFlash(Configure::read("Error.input"));
			}
		}
		if(empty($this->controller->request->data))
		{
			$this->controller->request->data = $model->read(null, $id);
		}
		$this->controller->set("pankuz_for_layout", array(
			array("str" => $title, "url" => array("action" => "index")),
			"編集",
		));
	}

/**
 * lump
 * 
 * @param	Model	$model
 * @access	public
 */
	function sys_lump(&$model)
	{
		if(!empty($this->controller->request->data))
		{
			if($model->saveAll($this->controller->request->data[$model->name]))
			{
				$this->controller->Session->setFlash(Configure::read("Success.lump"));
			}
			else
			{
				$this->controller->Session->setFlash(Configure::read("Error.lump"));
				return $this->controller->redirect($this->controller->referer(array('action' => 'index')));
			}
		}
		return $this->controller->redirect($this->controller->referer(array('action' => 'index')));
	}
	
/**
 * delete
 * 
 * @param	Model	$model
 * @param	number	$id
 * @access	public
 */
	function sys_delete(&$model, &$id)
	{
		if(!$id)
		{
			$this->controller->Session->setFlash(Configure::read("Error.id"));
			return $this->controller->redirect(array('action'=>'index'));
		}
		if($model->delete($id))
		{
			$this->controller->Session->setFlash(Configure::read("Success.delete"));
			return $this->controller->redirect(array('action'=>'index'));
		}
		$this->controller->Session->setFlash(Configure::read("Error.delete"));
		return $this->controller->redirect(array('action' => 'index'));
	}
}
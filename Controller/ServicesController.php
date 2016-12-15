<?php
class ServicesController extends AppController
{

	var $name = 'Services';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Service->find("first", array(
			"recursive" => -1,
			"conditions" => array("Service.path" => $path)
		));
		//リダイレクト
		$this->_emptyToHome($pageData);
//		pr($pageData);
		//
		//Set
		$this->set("pageData", $pageData);

		/**
		 * Title Data
		 */
		//Get
		// $this->Title->Behaviors->attach('Containable');
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => array(
					"Title.public" => 1,
					"Title.service_id" => $pageData["Service"]["id"],
				),
				"fields" => array(
					"Title.title_official",
					"Title.title_read",
					"Title.url_str",
					"Title.thumb_name",
					"Title.description",
					"Title.service_id",
					"Title.service_start",
					"Title.test_start",
					"Title.test_end",
					"Title.category_text",
					"Title.fee_id",
					"Title.fee_text",
					"Title.ad_use",
					"Title.ad_text",
					"Title.official_url",
					"Titlesummary.*",
					"Service.*",
					"Fee.*",
				),
				// "order" => array("Title.service_start DESC", "Title.test_start DESC", "Title.test_end DESC"),
				"order" => "Title.service_start DESC",
				"contain" => array("Titlesummary", "Category", "Service", "Fee"),
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
//		pr($titles);
		//
		//Set
		$this->set("titles", $titles);
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		$this->Service->recursive = 0;
		$services = $this->Service->find("all");
		$this->set('services', $services);

		$this->set("pankuz_for_layout", "サービス状態マスタ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'service'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('service', $this->Service->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Service->create();
			if($this->Service->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
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
			if($this->Service->save($this->request->data))
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
			$this->Service->recursive = -1;
			$this->request->data = $this->Service->read(null, $id);
		}
		$this->set("pankuz_for_layout", array("サービス状態マスタ", "編集"));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			if($this->Service->saveAll($this->request->data["Service"]))
			{
				$this->Session->setFlash(Configure::read("Success.lump"));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect($this->referer(array('action' => 'index')));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if($this->Service->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>
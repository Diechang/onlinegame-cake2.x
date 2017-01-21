<?php
class PortalsController extends AppController
{

	var $name = 'Portals';
	var $components = array("TitleData", "LumpEdit");

	function index()
	{
		//Get
		$portals = $this->Portal->find("all", array(
			"recursive" => -1,
			"conditions" => array(
				"Portal.public" => 1
			),
		));
//		pr($portals);
		//
		//Set
		$this->set("portals", $portals);
	}

	function view($path = null)
	{
		$this->_emptyToURL($path, array("action" => "index", "ext" => "html"));
		//Get
		// $this->Portal->Title->unbindAll(array("Fee", "Category", "Titlesummary"));

//		$defPortalTitleConditions = $this->Portal->hasAndBelongsToMany["Title"]["conditions"];
		// $this->Portal->hasAndBelongsToMany["Title"]["conditions"] = array(
		// 	"Title.public" => 1,
		// 	"NOT" => array(
		// 		"Title.service_id" => 1
		// 	)
		// );
//		$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = $defPortalTitleConditions;
		$this->Portal->Behaviors->load('Containable');

		$portal = $this->Portal->find("first", array(
			"contain" => array(
				"Title" => array(
					"fields" => array("title_official", "title_read", "url_str", "thumb_name", "description", "category_text"),
					"conditions" => array(
						"Title.public" => 1,
						"NOT" => array(
							"Title.service_id" => 1
						),
					),
					"Titlesummary" => array(
						"fields" => array("vote_avg_all")
					),
					"Category" => array(
						"fields" => array("str", "path")
					),
					"Fee" => array(
						"fields" => array("str", "path")
					),
					"Service" => array(
						"fields" => array("str", "path")
					)
				)
			),
			// "recursive" => 2,
			"conditions" => array(
				"Portal.public" => 1,
				"Portal.url_str" => $path,
			),
		));
		$this->_emptyToURL($portal, array("action" => "index", "ext" => "html"));
		// pr($portal);
		// exit;
		$portals = $this->Portal->find("all", array(
			"recursive" => -1,
			"conditions" => array(
				"Portal.public" => 1,
				"NOT" => array(
					"Portal.id" => $portal["Portal"]["id"],
				),
			),
		));
//		pr($this->Portal->hasAndBelongsToMany["Title"]["conditions"]);
//		exit;
		//
		//Set
		$this->set("portal", $portal);
		$this->set("portals", $portals);
	}

	/**
	 * Sys
	 */
	function sys_index()
	{
		$this->Portal->recursive = 0;
		$this->set('portals', $this->Portal->find("all", array("order" => "id DESC")));
		//
		$this->set("pankuz_for_layout", "ポータルマスタ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//		{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'portal'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('portal', $this->Portal->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			//コンディションなし - Title.publicが見つからない…
			$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = "";
			$this->Portal->create();
			if($this->Portal->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		$titles = $this->Portal->Title->find('list', array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "ポータルマスタ", "url" => array("action" => "index")),
			"新規登録",
		));
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
			//コンディションなし - Title.publicが見つからない…
			$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = "";
			if($this->Portal->save($this->request->data))
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
			$this->request->data = $this->Portal->read(null, $id);
		}
		$titles = $this->Portal->Title->find('list', array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "ポータルマスタ", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Portal"], $this->Portal))
			{
				if($this->Portal->saveAll($this->request->data["Portal"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
				}
				else
				{
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

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if($this->Portal->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>
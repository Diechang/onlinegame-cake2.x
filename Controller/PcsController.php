<?php
class PcsController extends AppController {

	var $name = 'Pcs';
	var $components	= array("LumpEdit");

	function index() {
		$this->Pc->Title->unbindAll(array("Titlesummary"));
		$titles = $this->Pc->Title->find("all" , array(
			"conditions" => array(
				"Titlesummary.pc_count >" => 0,
			),
			"order" => array("Title.service_start DESC" , "Title.service_id DESC"),
		));
		foreach($titles as &$title)
		{
			$title["lowestPrice"] = $this->Pc->field("price",
				array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"]
				),
				"Pc.price"
			);
			$title["desktopCount"] = $this->Pc->find("count" , array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 1,
				),
			));
			$title["noteCount"] = $this->Pc->find("count" , array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 2,
				),
			));
		}
//		pr($titles);
//		exit;

		$this->set("titles" , $titles);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		//リダイレクト
		if(!empty($this->request->params["url"]["w"])
			or !empty($this->request->params["url"]["title_id"])
			or !empty($this->request->params["url"]["pcshop_id"])
			or !empty($this->request->params["url"]["pctype_id"])
			or !empty($this->request->params["url"]["pcgrade_id"]))
		{
			$url = array();
			if(!empty($this->request->params["url"]["w"]))			{ $url["w"]			= $this->request->params["url"]["w"]; }
			if(!empty($this->request->params["url"]["title_id"]))	{ $url["title_id"]	= $this->request->params["url"]["title_id"]; }
			if(!empty($this->request->params["url"]["pcshop_id"]))	{ $url["pcshop_id"]	= $this->request->params["url"]["pcshop_id"]; }
			if(!empty($this->request->params["url"]["pctype_id"]))	{ $url["pctype_id"]	= $this->request->params["url"]["pctype_id"]; }
			if(!empty($this->request->params["url"]["pcgrade_id"]))	{ $url["pcgrade_id"]	= $this->request->params["url"]["pcgrade_id"]; }
			return $this->redirect($url);
		}
		//
		$conditions = array();

		//タイトルID
		$title_id = &$this->passedArgs["title_id"];
		if(isset($title_id))
		{
			$conditions += array("Pc.title_id" => $title_id);
			//title data
			$titleAddData = $this->Title->find("first" , array(
				"recursive" => -1,
				"conditions" => array("Title.id" => $title_id),
				"fields" => array("Title.title_official" , "Title.id"),
			));
//			pr($titleData);
//			exit;
			$this->set("titleAddData" , $titleAddData);
		}
		//ショップID
		$pcshop_id = &$this->passedArgs["pcshop_id"];
		if(isset($pcshop_id))
		{
			$conditions += array("Pc.pcshop_id" => $pcshop_id);
		}
		//検索ワード
		$w = &$this->passedArgs["w"];
		if(isset($w) && !empty($w))
		{
			$conditions += array("OR" => $this->Pc->wConditions(urldecode($w)));
		}
		//タイプ
		$pctype_id		= &$this->passedArgs["pctype_id"];
		if(isset($pctype_id) && !empty($pctype_id))
		{
			$conditions += array("Pc.pctype_id" => $pctype_id);
		}
		//グレード
		$pcgrade_id	= &$this->passedArgs["pcgrade_id"];
		if(isset($pcgrade_id) && !empty($pcgrade_id))
		{
			$conditions += array("Pc.pcgrade_id" => $pcgrade_id);
		}

		$this->set("pcs" , $this->Pc->find("all" , array(
			"conditions" => $conditions,
			"fields" => array(
				"Pc.*",
				"Pctype.*",
				"Pcgrade.*",
				"Pcshop.shop_name",
				"Title.title_official",
			),
			"order" => "Pc.id DESC",
		)));
		//
		$this->set("pankuz_for_layout" , "PC一覧");
		$this->set("titles" , $this->Pc->Title->find("list" , array(
			"conditions" => array(
				"Title.id" => $this->Pc->find("list" , array(
					"fields" => "Pc.title_id",
				))
			),
		)));
		$this->set("pcshops" , $this->Pc->Pcshop->find("list"));
		$this->set("pctypes" , $this->Pc->Pctype->find("list"));
		$this->set("pcgrades" , $this->Pc->Pcgrade->find("list"));
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'pc'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('pc', $this->Pc->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->Pc->create();
			if ($this->Pc->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				if(!empty($this->request->data["Pc"]["title_id"]))
				{
					return $this->redirect(array('action' => 'index' , 'title_id' => $this->request->data["Pc"]["title_id"]));
				}
				else
				{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//タイトルID
		if(isset($this->passedArgs["title_id"]))
		{
			$conditions = array("Title.id" => $this->passedArgs["title_id"]);
			$this->set("withTitle" , true);
		}
		else
		{
			$conditions = array();
		}
		$titles = $this->Pc->Title->find('list' , array(
			"conditions" => $conditions,
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "PC一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Pc->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Pc->read(null, $id);
		}
		$titles = $this->Pc->Title->find('list' , array(
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "PC一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Pc"] , $this->Pc))
			{
//				pr($this->request->data["Pc"]);
//				exit;
				if ($this->Pc->saveAll($this->request->data["Pc"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdatePcs()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
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
		return $this->redirect($this->referer());
	}

	function sys_copy($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Pc->recursive = -1;
		$this->request->data = $this->Pc->read(null , $id);
//		pr($this->request->data);
//		exit;
		$this->request->data["Pc"]["public"] = 0;
		unset($this->request->data["Pc"]["id"]);
		$this->Pc->create();
		if ($this->Pc->save($this->request->data)) {
			$this->Session->setFlash(Configure::read("Success.copy"));
			return $this->redirect(array('action' => 'index' , $this->request->data["Pc"]["title_id"]));
		}
		$this->Session->setFlash(Configure::read("Error.copy"));
		return $this->redirect($this->referer());
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->Pc->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer());
	}
}
?>
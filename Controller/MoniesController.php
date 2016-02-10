<?php
class MoniesController extends AppController {

	var $name = 'Monies';
	var $components	= array("LumpEdit");

	function index()
	{
		//Get
		$moneycategories = $this->Money->Moneycategory->find("all" , array(
			"conditions" => array("Moneycategory.public" => 1),
			"order" => "Moneycategory.sort"
		));
		//
		//Set
		$this->set("moneycategories" , $moneycategories);
		//Set - Layout vars
		$this->set("title_for_layout" , "無料でお小遣い稼ぎ！ゲーム料金を無料で稼ごう");
		$this->set("keywords_for_layout" , "オンラインゲーム,小遣い稼ぎ,無料,ポイントサイト,アフィリエイト,WebMoney,ウェブマネー");
		$this->set("description_for_layout" , "ゲーム料金を無料で稼ごう！管理人も登録している安心サイトでゲーム料金＆お小遣い稼ぎ。。");
		$this->set("h1_for_layout" , "無料でお小遣い稼ぎ！ゲーム料金を無料で稼ごう");
		$this->set("pankuz_for_layout" , "ゲーム代を稼ぐ");
	}

	function view($path = null)
	{
		if(empty($path))
		{
			//Redirect
			return $this->redirect(array("action" => "index" , "ext" => "html"));
		}
		else
		{
			/*
			 * Page data
			 */
			//Get
			$pageData = $this->Money->Moneycategory->find("first" , array(
				"recursive" => -1,
				"conditions" => array(
					"Moneycategory.public" => 1,
					"Moneycategory.path" => $path
				)
			));
//			pr($pageData);
//			exit;
			if(empty($pageData))
			{
				return $this->redirect(array("action" => "index"));
			}
			$monies = $this->Money->find("all" , array(
				"recursive" => -1,
				"conditions" => array(
					"Money.public" => 1,
					"Money.moneycategory_id" => $pageData["Moneycategory"]["id"],
				),
			));
//			pr($monies);
			$moneycategories = $this->Money->Moneycategory->find("all" , array(
				"recursive" => -1,
				"conditions" => array(
					"Moneycategory.public" => 1,
					"NOT" => array(
						"Moneycategory.id" => $pageData["Moneycategory"]["id"]
					)
				),
			));
//			pr($moneycategories);
			//
			//Set
			$this->set("pageData" , $pageData);
			$this->set("monies" , $monies);
			$this->set("moneycategories" , $moneycategories);
			//Set - Layout vars
			$this->set("title_for_layout" , $pageData["Moneycategory"]["str"] . "で稼ぐ！ゲーム料金を無料で稼ごう");
			$this->set("keywords_for_layout" , $pageData["Moneycategory"] . ",小遣い稼ぎ,無料");
			$this->set("description_for_layout" , $pageData["Moneycategory"]["str"] . "でゲーム料金を無料で稼ごう！管理人も登録している安心サイトのご紹介。");
			$this->set("h1_for_layout" , $pageData["Moneycategory"]["str"] . "で稼ぐ！ゲーム料金を無料で稼ごう");
			$this->set("pankuz_for_layout" , array(
				array("str" => "ゲーム代を稼ぐ" , "url" => array("action" => "index" , "ext" => "html")),
				$pageData["Moneycategory"]["str"]
			));
		}
	}


	/*
	 * Sys
	 */
	function sys_index() {
		$this->set('monies', $this->Money->find("all", array("order" => "Money.id")));
		//
		$this->set("pankuz_for_layout" , "小遣いサイト");
	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->Money->create();
			if ($this->Money->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		$moneycategories = $this->Money->Moneycategory->find('list');
		$this->set(compact('moneycategories'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "小遣いサイト" , "url" => array("action" => "index")),
			"新規登録",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Money->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Money->read(null, $id);
		}
		$moneycategories = $this->Money->Moneycategory->find('list');
		$this->set(compact('moneycategories'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "小遣いサイト" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Money"] , $this->Money, "asc"))
			{
				if ($this->Money->saveAll($this->request->data["Money"])) {
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

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if ($this->Money->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>
<?php
App::uses("CakeEmail", "Network/Email");

class LinksController extends AppController {

	var $name = 'Links';
	var $uses = array("Link" , "Linkcategory");
	var $components = array("Common");

	function index($path = null)
	{
		if(empty($path))
		{
			//Redirect
			return $this->redirect(array("controller" => "links" , "path" => "index" , "ext" => "html"));
		}
		else
		{
			/*
			 * Category Data
			 */
			//Get
			$linkCategories = $this->Linkcategory->find("all" , array(
				"recursive" => -1,
				"order" => "Linkcategory.sort",
			));
//			pr($dataCategories);
			//
			//Set
			$this->set("linkCategories" , $linkCategories);

			//Category Pathes
			$pathes = array();
			foreach($linkCategories as $category)
			{
				array_push($pathes , $category["Linkcategory"]["path"]);
			}

			/**
			 * Page Data
			 */
			if(in_array($path , $pathes))
			{//$pathがCategory一致
				//Get
				$dataPage = $this->Linkcategory->find("first" , array(
					"conditions" => array("Linkcategory.path" => $path)
				));
//				pr($dataPage);
				$str = $dataPage["Linkcategory"]["str"];
				//Pankuz set
				$this->set("pankuz_for_layout" , array(
					array(
						"str" => "相互リンク集",
						"url" => array("controller" => "links" , "path" => "index" , "ext" => "html")
					),
					$str,
				));
				//Set
				$this->set("title_for_layout" , "【" . $str . "】相互リンク集");
				$this->set("keywords_for_layout" , "相互リンク," . $str);
				$this->set("description_for_layout" , "オンラインゲームライフと相互リンクしていただいている「" . $str . "」カテゴリのサイト集です。相互リンク依頼は専用フォームからどうぞ。");
				$this->set("h1_for_layout" , "【" . $str . "】相互リンク集");
				//
				//Conditions
				$conditions = array(
					"public" => 1,
					"Linkcategory.path" => $path
				);
			}
			elseif($path == "index")
			{//Index - 総合
				$str = "おすすめ";
				//Pankuz set
				$this->set("pankuz_for_layout" , "相互リンク集");
				//Set
				$this->set("title_for_layout" , "相互リンク集");
				$this->set("keywords_for_layout" , "相互リンク");
				$this->set("description_for_layout" , "オンラインゲームライフと相互リンクしていただいているおすすめサイト集です。相互リンク依頼は専用フォームからどうぞ。");
				$this->set("h1_for_layout" , "相互リンク集");
				//
				//Conditions
				$conditions = array(
					"public" => 1,
					"pickup" => 1,
				);
			}
			else
			{
				throw new NotFoundException();
			}
			//
			$this->set("mainStr" , $str);
			$this->set("path" , $path);

			$this->set("metaTags" , array("noindex"));

			/**
			 * Link Data
			 */
			$links = $this->Link->find("all" , array(
				"conditions" => $conditions,
			));
//			pr($links);
			$this->set("links" , $links);
			$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		}
	}

	function add() {
		if (!empty($this->request->data))
		{
			//認証番号チェック
			if($this->Common->spamCheck($this->request->data["Link"]["spam_num"]))
			{
				$this->Link->create();
				if ($this->Link->save($this->request->data))
				{
					//Send mail
					$email = new CakeEmail("sakura");
					$email->from(!empty($this->request->data["Link"]["admin_mail"])
						? $this->request->data["Link"]["admin_mail"]
						: array("zilow@dz-life.net" => "DZ-LIFE"));
					$email->to('zilow@dz-life.net');
					$email->subject('[DZ]相互リンク依頼');
					$email->send("
■サイト名
{$this->request->data['Link']['site_name']}

■サイトURL
{$this->request->data['Link']['site_url']}

■リンクURL
{$this->request->data['Link']['link_url']}

■メッセージ
{$this->request->data['Link']['message']}

■編集URL
http://onlinegame.dz-life.net/sys/links/edit/{$this->Link->id}

■相互リンク一覧
http://onlinegame.dz-life.net/sys/links
					");
					//
					$this->Session->setFlash("相互リンク申込ありがとうございます！<br />\n管理人の承認後に掲載されます。");
					return $this->redirect(array('action' => 'index'));
				}
				else
				{
					$this->Session->setFlash("登録できませんでした。<br />\n入力内容を確認してください。");
				}
			}
			else
			{
				$this->Session->setFlash("認証番号が不正です");
			}
			//
			$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
			//Set - Layout vars
			$this->set("title_for_layout" , "相互リンク登録申込");
			$this->set("keywords_for_layout" , "");
			$this->set("description_for_layout" , "");
			$this->set("h1_for_layout" , "相互リンク登録申込");
			$this->set("pankuz_for_layout" , array(
				array("str" => "相互リンク集" , "url" => array("controller" => "links" , "action" => "index" , "path" => "index" , "ext" => "html")),
				"登録申込",
			));

			$this->set("metaTags" , array("noindex"));
		}
		else
		{
			return $this->redirect("/");
		}
	}


	/**
	 * Sys
	 */
	function sys_index() {
		$this->Link->recursive = 0;
		$this->set('links', $this->Link->find("all" , array("order" => "Link.id DESC")));
		$this->set("linkcategories" , $this->Link->Linkcategory->find("all" , array("recursive" => -1)));
		//
		$this->set("pankuz_for_layout" , "相互リンク一覧");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'link'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('link', $this->Link->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			if(empty($this->request->data["Link"]["admin_name"])){ $this->request->data["Link"]["admin_name"] = "zilow"; }
			if(empty($this->request->data["Link"]["admin_mail"])){ $this->request->data["Link"]["admin_mail"] = "zilow@dz-life.net"; }
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//
		$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		$this->set("pankuz_for_layout" , "相互リンク登録");
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Link->read(null, $id);
		}
		//
		$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		$this->set("pankuz_for_layout" , array(
			array("str" => "相互リンク一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			if ($this->Link->saveAll($this->request->data["Link"])) {
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
		if ($this->Link->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>